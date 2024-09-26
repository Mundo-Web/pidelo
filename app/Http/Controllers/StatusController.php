<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index()
    {
        $statuses = Status::where("status", "=", true)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('pages.statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = new Status();
        return view('pages.statuses.save', compact('status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $status = Status::findOrfail($id);

        return view('pages.statuses.save', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $body = $request->all();

        $jpa = Status::find($request->id);
        if (!$jpa) {
            $body['status'] = true;
            Status::create($body);
        } else {
            $jpa->update($body);
        }

        return redirect()->route('estados.index')->with('success', 'Estado creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        //
    }

    public function delete(Request $request, string $statusId)
    {
        $status = Status::findOrfail($statusId);
        $status->status = false;
        $status->save();

        return response()->json(['message' => 'Estado eliminado']);
    }
}
