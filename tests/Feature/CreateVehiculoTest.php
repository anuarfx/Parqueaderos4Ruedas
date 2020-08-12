<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class CreateVehiculoTest extends TestCase
{
    use RefreshDatabase,DatabaseMigrations;
    /** @test */
    public function agregar_nuevo_vehiculo_para_usuarios_autenticados()
    {
        
        \Session::start();
        $user = factory(User::class)->create();
        $this->actingAs($user);
        
        $response = $this->withSession(['_token' => csrf_token()])
        ->post('vehiculo', [
            '_token' => csrf_token(),
            'nombre'=> "Anuar",
            'apellido'=> "Saballeth",
            'cedula'=> "1065828123",
            'telefono'=> "3128532754",
            'placa'=> "MQR145",
            'marca'=> "Kia",
            'model'=> "2020",
            'tipo'=> "Automovil",
        ]);

        $response->assertStatus(302);
        /*$this->post('vehiculo',[
            '_token' => csrf_token(),
            'nombre'=> "Anuar",
            'apellido'=> "Saballeth",
            'cedula'=> "1065828123",
            'telefono'=> "3128532754",
            'placa'=> "MQR145",
            'marca'=> "Kia",
            'model'=> "2020",
            'tipo'=> "Automovil",
        ]);*/

        $this->assertDatabaseHas('propietarios',[
            'nombre'=> "Anuar",
            'apellido'=> "Saballeth",
            'cedula'=> "1065828123",
            'telefono'=> "3128532754"
        ]);
        $this->assertDatabaseHas('vehiculos',[
            'placa'=> "MQR145",
            'marca'=> "Kia",
            'model'=> "2020",
            'tipo'=> "Automovil"
        ]);
        
    }
}
