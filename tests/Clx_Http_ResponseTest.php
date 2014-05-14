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


    public function testValidConstruct()
    {
        $this->assertInstanceOf('Clx_Http_Response', $this->Clx_Http_Response);
        $this->assertEquals( 'body', $this->Clx_Http_Response->getBody() );
        $this->assertEquals( 'headers', $this->Clx_Http_Response->getHeaders() );
        $this->assertEquals( 200, $this->Clx_Http_Response->getStatusCode() );
        $this->assertEquals( 'error', $this->Clx_Http_Response->getError() );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueBodyConstructThrowsIfNotString()
    {
        new Clx_Http_Response( 1, 'headers', 200, 'error' );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueHeadersConstructThrowsIfNotString()
    {
        new Clx_Http_Response( 'body', 1, 200, 'error' );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueStatusCodeConstructThrowsIfNotInteger()
    {
        new Clx_Http_Response( 'body', 'headers', '200', 'error' );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueErrorConstructThrowsIfNotString()
    {
        new Clx_Http_Response( 'body', 'headers', 200, 1 );
    }

}