<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Response.php';

class Clx_Http_ResponseTest extends PHPUnit_Framework_TestCase {

    private $Clx_Http_Response;

    public function setUp() {

        $body = '{"id":1,"name":"John","network":"Doe","uniqueName":"JohnDOE","isoCountryCode":"12","operationalState":"active","operationalStatDate":"-0001-11-30 00:00:00","numberOfSubscribers":0}';
        $rawHeaders = "HTTP/1.1 200 OK\r
                        Server: Apache\r
                        Content-Type: application/json\r";

        $statusCode = 200;
        $error = 'error';
        $this->Clx_Http_Response = new Clx_Http_Response( $body, $rawHeaders, $statusCode, $error );
    }


    public function testValidConstruct()
    {
        $body = '{"id":1,"name":"John","network":"Doe","uniqueName":"JohnDOE","isoCountryCode":"12","operationalState":"active","operationalStatDate":"-0001-11-30 00:00:00","numberOfSubscribers":0}';
        $expectedHeadersArray = array(
            'Server' => 'Apache',
            'Content-Type' => 'application/json'
        );

        $expectedRawHeadersString = "HTTP/1.1 200 OK\r
                        Server: Apache\r
                        Content-Type: application/json\r";
        $statusCode = 200;
        $error = 'error';


        $this->assertInstanceOf('Clx_Http_Response', $this->Clx_Http_Response);
        $this->assertEquals( $body, $this->Clx_Http_Response->getBody() );
        $this->assertEquals( $expectedRawHeadersString, $this->Clx_Http_Response->getRawHeaders() );
        $this->assertEquals( $expectedHeadersArray, $this->Clx_Http_Response->getHeaders() );
        $this->assertEquals( $statusCode, $this->Clx_Http_Response->getStatusCode() );
        $this->assertEquals( $error, $this->Clx_Http_Response->getError() );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueBodyConstructThrowsIfNotString()
    {
        new Clx_Http_Response( 1, 'rawHeaders', 200, 'error' );
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
        new Clx_Http_Response( 'body', 'rawHeaders', '200', 'error' );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testFaultyValueErrorConstructThrowsIfNotString()
    {
        new Clx_Http_Response( 'body', 'rawHeaders', 200, 1 );
    }

}