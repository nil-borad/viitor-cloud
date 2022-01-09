<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [
            'email' => "nilakanthb@gmail.com",
            'password' => '12345678',
        ];
        $response = $this->post('/login', $data);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
