<?php
namespace Tests\Api;
use Tests\Support\ApiTester;
class ApiTestCest
{
    public function testGetUserById(ApiTester $I)
{
    $I->sendGET('/users/2');
    $I->seeResponseCodeIs(200);
    $expectedData = [
        'data' => [
            'email' => 'janet.weaver@reqres.in',
            'first_name' => 'Janet'
        ]
    ];
    $I->seeResponseContainsJson($expectedData);
}
    public function testPostUser(ApiTester $I)
    {
        $dataToSend = [
            "name" => "Thu Phuong",
            "job" => "leader"
        ];
        $I->sendPOST('/users', $dataToSend);
        $I->seeResponseCodeIs(201);
        $I->seeResponseContainsJson($dataToSend);
    }
    public function testUpdateUser(ApiTester $I)
{
    $updatedData = [
        "name" => "Tinh",
        "job" => "zion resident"
    ];
    $userId = 2;
    $I->sendPUT("/users/{$userId}", $updatedData);
    $I->seeResponseCodeIs(200);
    $I->seeResponseContainsJson($updatedData);
}
public function testDeleteUser(ApiTester $I)
{
    $userId = 2;
    $I->sendDELETE("/users/{$userId}");
    $I->seeResponseCodeIs(204);
    $I->seeResponseEquals(''); 
}
}
