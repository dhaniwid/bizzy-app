<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    /**
     * Insert new user data test
     *
     * @return void
     */
    public function testInsertNewUser()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/user', ['name' => 'Jason', 'email' => 'jason@mailinator.com']);

        $response
            ->assertOk()
            ->assertJsonFragment([
                'name' => 'Jason',
                'email' => 'jason@mailinator.com',
                'status' => 'true'
            ]);
    }

    /**
     * Duplication test
     *
     * @return void
     */
    public function testDuplicated()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/user', ['name' => 'Jason', 'email' => 'jason@mailinator.com']);

        // then try to insert again
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/user', ['name' => 'Jason', 'email' => 'jason@mailinator.com']);

        $response
            ->assertStatus(409)
            ->assertJson([
                'message' => 'Email has already been used',
                'status' => 'false'
            ]);
    }
    /**
     * Test invalid email
     *
     * @return void
     */
    public function testInvalidEmail()
    {
        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/user', ['email' => 'bizzy @mailinator .gom']);

        $response
            ->assertStatus(400)
            ->assertJson([
                'email' => 'bizzy @mailinator .gom',
                'message' => 'is invalid',
                'status' => 'false'
            ]);
    }
    
    

}
