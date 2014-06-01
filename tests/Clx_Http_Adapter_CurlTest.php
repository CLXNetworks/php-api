<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Adapter_Curl.php';

class Clx_Http_Adapter_CurlTest extends PHPUnit_Framework_TestCase {

    private $Clx_Http_Adapter_Curl;

    private $baseUrl = 'http://httpbin.org';

    public function setUp()
    {
        $this->Clx_Http_Adapter_Curl = new Clx_Http_Adapter_Curl();
    }

    public function testValidConstruct()
    {

        $this->assertInstanceOf( 'Clx_Http_Adapter_Curl', $this->Clx_Http_Adapter_Curl );
    }

    public function testAuthSuccess()
    {
        $auth = array(
            'username' => 'user',
            'password'=> 'passwd'
        );

        $response = $this->Clx_Http_Adapter_Curl->get( $auth, $this->baseUrl . '/basic-auth/user/passwd');

        $this->assertEquals( 200,  $response->getStatusCode());
    }

    public function testAuthFail()
    {
        $auth = array(
            'username' => 'wronguser',
            'password'=> 'wrongpass'
        );

        $response = $this->Clx_Http_Adapter_Curl->get( $auth, $this->baseUrl . '/basic-auth/user/passwd');

        $this->assertEquals( 401,  $response->getStatusCode());
    }

    public function testGet()
    {

        $response = $this->Clx_Http_Adapter_Curl->get( null, $this->baseUrl . '/get?id=1');
        $body = $response->getJsonDecodedBody();
        $statusCode = $response->getStatusCode();


        $this->assertInstanceOf( 'Clx_Http_Response', $response );
        $this->assertEquals( 200, $statusCode );
        $this->assertEquals( 1,  $body->args->id);

    }

    public function testPost()
    {
        $postData = array(
            'arg1' => 'test',
            'arg2'=> 'test2'
        );

        $response = $this->Clx_Http_Adapter_Curl->post( null, $this->baseUrl . '/post', $postData );
        $body = $response->getJsonDecodedBody();
        $statusCode = $response->getStatusCode();

        $this->assertInstanceOf( 'Clx_Http_Response', $response );
        $this->assertEquals( 200, $statusCode );
        $this->assertEquals( 'test',  $body->form->arg1);
    }

    public function testPut()
    {
        $postData = array(
            'arg1' => 'test',
            'arg2'=> 'test2'
        );

        $response = $this->Clx_Http_Adapter_Curl->put( null, $this->baseUrl . '/put', $postData );
        $body = $response->getJsonDecodedBody();
        $statusCode = $response->getStatusCode();

        $this->assertInstanceOf( 'Clx_Http_Response', $response );
        $this->assertEquals( 200, $statusCode );
        $this->assertEquals( 'test',  $body->form->arg1);
    }

    public function testDelete()
    {
        $postData = array(
            'id' => '1',
        );

        $response = $this->Clx_Http_Adapter_Curl->delete( null, $this->baseUrl . '/delete', $postData );
        $body = $response->getJsonDecodedBody();
        $statusCode = $response->getStatusCode();

        $this->assertInstanceOf( 'Clx_Http_Response', $response );
        $this->assertEquals( 200, $statusCode );
        $this->assertEquals( 1,  $body->args->id);
    }
}
 