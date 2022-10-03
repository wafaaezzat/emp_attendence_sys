<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_user_duplication()
    {
        $user1=User::make([
            'name'=>'John Doe',
            'email'=>'johndoe@gmail.com'
        ]);

        $user2=User::make([
            'name'=>'Dary',
            'email'=>'dary@gmail.com'
        ]);

        $this->assertTrue($user1->email!=$user2->email);
    }

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {

        $user = User::factory()->create();
        $response = $this->post('/register', [
            'name' => 'Test User',
            'phone' => '01122688335',
            'address' => 'Test User',
            'bio' => 'Test User',
            'email' => 'test700@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
//        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => 'lelah.mclaughlin@example.org',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('user/dashboard');
    }


    public function test_admins_can_authenticate_using_the_login_screen()
    {

        $response = $this->post('/login', [
            'email' => 'barrows.fidel@example.net',
            'password' => 'password',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect('admin/dashboard');
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);
        $this->assertGuest();
    }


    public function test_if_seeder_works(){
        $this->seed();
    }
}
