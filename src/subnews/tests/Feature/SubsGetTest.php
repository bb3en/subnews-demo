<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\SubsChannel;
class SubsGetTest extends TestCase
{

    public function testGetChannel()
    {
        $response = $this->json('GET', '/api/channel');
        $response
            ->assertStatus(200);
    }
    public function testGetUser()
    {
        $response = $this->json('GET', '/api/user');
        $response
            ->assertStatus(200);
    }
    
    public function testGetOrder()
    {
        $response = $this->json('GET', '/api/user');
        $response
            ->assertStatus(200);
    }

}
