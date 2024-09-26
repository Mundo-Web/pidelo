<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Popup;

class PopupControllerTest extends TestCase
{
  /**
   * A basic feature test example.
   */

  use RefreshDatabase;
  public function testAPopupCanBeCreated()
  {
    $response = $this->post(route('popup.store'),  [
      
      'title' => 'title',
        'description' => 'description',
        'image' => 'image',
        'button_text' => 'button_text',
        'button_link' => 'button_link',
      
      // Añade aquí más campos según tu modelo Popup
    ]);

    $this->assertCount(1, Popup::all());
    $response->assertRedirect(route('popups.index'));
    $response->assertSessionHas('success', 'Popup creado correctamente');
  }
}
