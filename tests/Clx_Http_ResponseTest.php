<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Response.php';

class Clx_Http_ResponseTest extends PHPUnit_Framework_TestCase {

    private $Clx_Http_Response;

    public function setUp() {

        $body = 'body';
        $headers = 'headers';
        $statusCode = 200;
        $error = 'error';
        $this->Clx_Http_Response = new Clx_Http_Response( $body, $headers, $statusCode, $error );
    }

    //test construct
    public function testConstruct()
    {
        $body = 'body';
        $headers = 'headers';
        $statusCode = 200;
        $error = 'error';

        $Clx_Http_Response = new Clx_Http_Response( $body, $headers, $statusCode, $error );

        $this->assertInstanceOf('Clx_Http_Response', $Clx_Http_Response);
        $this->assertEquals( $body, $Clx_Http_Response->getBody() );
        $this->assertEquals( $headers, $Clx_Http_Response->getHeaders() );
        $this->assertEquals( $statusCode, $Clx_Http_Response->getStatusCode() );
        $this->assertEquals( $error, $Clx_Http_Response->getError() );
    }


    public function testGetBody()
    {
        $this->assertEquals( 'body', $this->Clx_Http_Response->getBody() );
    }

    public function testGetHeaders()
    {
        $this->assertEquals( 'headers', $this->Clx_Http_Response->getHeaders() );
    }

    public function testGetStatusCode()
    {
        $this->assertEquals( '200', $this->Clx_Http_Response->getStatusCode() );
    }

    public function testGetError()
    {
        $this->assertEquals( 'error', $this->Clx_Http_Response->getError() );
    }


    //test generateResponse


}