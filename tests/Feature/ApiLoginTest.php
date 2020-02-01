<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testUserCanLoginWithCorrectInfo(){
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'larami'),

        ]);

        $response = $this->post('http://localhost:8000/api/login', [
            'email' => $user->email,
            'password' => $password,
        ]);


        $response->assertStatus(200);
        $response->assertJson([
            'authenticated' => true,
            'username' => $user->first_name.' '.$user->last_name,
            'user_id' => $user->id,

            ]);
    }
    public function testUserCannotLoginWithWrongInfo(){
        $user = factory(User::class)->create([
            'password' => bcrypt($password = 'larami'),

        ]);
        $response = $this->post('http://localhost:8000/api/login', [
            'email' => $user->email,
            'password' => $user->password,
        ]);
        $response->assertJson([
            'email' => ['Provided email and password does not match!']
        ]);
    }

}
