<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubsOrderTest extends TestCase
{

    public function testCreateChannel()
    {

       $data = [
        'channelName' => 'demoChannelTest',
       ];

       $response = $this->json('POST','/api/channel',$data);

       $response->assertStatus(201);
       
    }
    public function testCreateUser()
    {

    $data = [
        'userName' => 'demoMan',
        'userAccount' => 'demo55688',
        'userPassword' => 'secret1234',
        'userJoinDatetime' => '2019-02-23 00:00:00'
    ];

    $response = $this->json('POST','/api/user',$data);

    $response->assertStatus(201);

    }


    public function testCreateOrder()
    {

    $data = [
        'channelName' => 'demoChannelTest',
        'userAccount' => 'demo55688',
        'orderEnable' => 1,
        'orderDatetime' => '2019-02-23 00:00:00',
    ];

    $response = $this->json('POST','/api/order',$data);

    $response->assertStatus(201);

    }
    public function testUpdateOrderEnable()
    {
    //User's data
    $data = [
        'channelName' => 'demoChannelTest',
        'orderEnable' => '0'
    ];
    //Send post request
    $response = $this->json('Put','/api/order/demo55688',$data);
    //Assert it was successful
    $response->assertStatus(200);
    //SubsUser::where('userAccount','demo55688')->delete();

    }
    public function testUpdateUserJoinDatetime()
    {
    //User's data
    $data = [
        'userJoinDatetime' => '2019-02-23 12:00:00'
    ];
    //Send post request
    $response = $this->json('Put','/api/user/demo55688',$data);
    //Assert it was successful
    $response->assertStatus(200);
    //SubsUser::where('userAccount','demo55688')->delete();

    }
    
    public function testDeleteOrder()
    {
        $data = ['channelName' => 'demoChannelTest'];
        
        $response = $this->json('DELETE', '/api/order/demo55688', $data);

        $response->assertStatus(204);
    }
    
    public function testDeleteChannel()
    {
        $response = $this->json('DELETE', '/api/channel/demoChannelTest');

        $response->assertStatus(204);
    }
    
    public function testDeleteUser()
    {

    $response = $this->json('DELETE', '/api/user/demo55688');
    //Assert it was successful
    $response->assertStatus(204);

    }

}
