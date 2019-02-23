<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\SubsUser;
class SubsUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUser()
    {
        $response = $this->json('GET', '/api/user');
        $response
            ->assertStatus(200);
    }
    
    public function testRegister()
    {
    //User's data
    $data = [
        'userName' => 'demoMan',
        'userAccount' => 'demo55688',
        'userPassword' => 'secret1234',
        'userJoinDatetime' => '2019-02-23 00:00:00'
    ];
    //Send post request
    $response = $this->json('POST','/api/user/store',$data);
    //Assert it was successful
    $response->assertStatus(201);
    //Delete data
    SubsUser::where('userAccount','demo55688')->delete();
    }
}
