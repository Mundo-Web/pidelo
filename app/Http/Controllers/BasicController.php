<?php

namespace App\Http\Controllers;

use App\Http\Classes\dxResponse;
use App\Models\dxDataGrid;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class BasicController extends Controller
{
  public $model = Model::class;
  public $softDeletion = true;
  public $reactView = 'Home';
  public $reactRootView = 'admin';


  public function all(Request $request) {
    
  }

  public function setPaginationInstance(string $model)
  {
    return $model::select();
  }

  public function setReactViewProperties()
  {
    return [];
  }

  public function reactView()
  {
    $properties = [
      'session' => Auth::user(),
      'permissions' => Auth::user()->getAllPermissions()
    ];
    foreach ($this->setReactViewProperties() as $key => $value) {
      $properties[$key] = $value;
    }
    return Inertia::render($this->reactView, $properties)->rootView($this->reactRootView);
  }

  public function paginate(Request $request): HttpResponse|ResponseFactory
  {
    $response =  new dxResponse();
    try {
      $instance = $this->setPaginationInstance($this->model);

      if ($request->group != null) {
        [$grouping] = $request->group;
        $selector = str_replace('.', '__', $grouping['selector']);
        $instance = $this->model::select([
          "{$selector} AS key"
        ])
          ->groupBy($selector);
      }

      // if (!Auth::user()->can('general.root')) {
      //   $instance->whereNotNull('status');
      // }

      if ($request->filter) {
        $instance->where(function ($query) use ($request) {
          dxDataGrid::filter($query, $request->filter ?? []);
        });
      }

      if ($request->sort != null) {
        foreach ($request->sort as $sorting) {
          $selector = \str_replace('.', '__', $sorting['selector']);
          $instance->orderBy(
            $selector,
            $sorting['desc'] ? 'DESC' : 'ASC'
          );
        }
      } else {
        $instance->orderBy('id', 'DESC');
      }

      $totalCount = $instance->count('*');
      $jpas = $request->isLoadingAll
        ? $instance->get()
        : $instance
        ->skip($request->skip ?? 0)
        ->take($request->take ?? 10)
        ->get();

      $results = [];

      foreach ($jpas as $jpa) {
        $result = JSON::unflatten($jpa->toArray(), '__');
        $results[] = $result;
      }

      $response->status = 200;
      $response->message = 'Operación correcta';
      $response->data = $results;
      $response->totalCount = $totalCount;
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage() . ' Ln.' . $th->getLine();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }

  public function beforeSave(Request $request) {
    return $request->all();
  }
  public function save(Request $request): HttpResponse|ResponseFactory
  {
    $response = new Response();
    try {

      $body = $this->beforeSave($request);
      $jpa = $this->model::find($request->id);

      if (!$jpa) {
        $jpa = $this->model::create($body);
      } else {
        $jpa->update($body);
      }

      $data = $this->afterSave($request, $jpa);
      if ($data) {
        $response->data = $data;
      }

      $response->status = 200;
      $response->message = 'Operacion correcta';
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }

  public function afterSave(Request $request, object $jpa) {
    return null;
  }

  public function status(Request $request)
  {
    $response = new Response();
    try {
      $this->model::where('id', $request->id)
        ->update([
          'status' => $request->status ? 0 : 1
        ]);

      $response->status = 200;
      $response->message = 'Operacion correcta';
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }

  public function delete(Request $request, string $id)
  {
    $response = new Response();
    try {
      $deleted = $this->softDeletion
        ? $this->model::where('id', $id)
        ->update(['status' => null])
        : $this->model::where('id', $id)
        ->delete();

      if (!$deleted) throw new Exception('No se ha eliminado ningun registro');

      $response->status = 200;
      $response->message = 'Operacion correcta';
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }
}
