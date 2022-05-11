<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;

class AuthenticationControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_should_have_status_code_200()
    {
        $response = $this->get(route('auth.login'));

        $response->assertStatus(200);
    }

    public function test_register_should_have_status_code_200()
    {
        $response = $this->get(route('auth.register'));

        $response->assertStatus(200);
    }

    public function logoutResponse()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('auth.logout'));

        return $response;
    }

    public function test_logout_should_redirect_to_authlogin()
    {
        $response = $this->logoutResponse();

        $response->assertRedirect(route('auth.login'));
    }

    public function test_logout_should_kick_user()
    {
        $this->logoutResponse();

        $this->assertGuest();
    }

    public function loginUserSuccessResponse()
    {
        User::factory()->create([
            'nik' => 1,
            'fullname' => 'John Doe'
        ]);

        return $this->post(route('auth.login-user'), [
            'nik' => 1,
            'fullname' => 'John Doe'
        ]);
    }

    public function test_loginUser_should_redirect_to_pagehome()
    {
        $response = $this->loginUserSuccessResponse();

        $response->assertRedirect(route('page.home'));
    }

    public function test_loginUser_should_login_user()
    {
        $this->loginUserSuccessResponse();

        $this->assertAuthenticated();
    }

    public function test_loginUser_should_redirect_back_with_errors()
    {
        $response = $this->post(route('auth.login-user'), [
            'nik' => 1000,
            'fullname' => 'NOTFOUND'
        ]);

        $response->assertSessionHasErrors([
            'message' => 'NIK atau Nama Lengkap tidak valid'
        ]);
    }

    public function registerNewUserResponse()
    {
        return $this->post(route('auth.register-new-user'), [
            'nik' => 10101010,
            'fullname' => 'Carlos Abigail'
        ]);
    }

    public function test_registerNewUser_should_redirect_to_pagehome()
    {
        $response = $this->registerNewUserResponse();

        $response->assertRedirect(route('page.home'));
    }

    public function test_registerNewUser_should_persist_user_to_database()
    {
        $this->registerNewUserResponse();

        $this->assertDatabaseHas('users', [
            'nik' => 10101010,
            'fullname' => 'Carlos Abigail'
        ]);
    }

    public function test_registerNewUser_should_login_user()
    {
        $this->registerNewUserResponse();

        $this->assertAuthenticated();
    }
}
