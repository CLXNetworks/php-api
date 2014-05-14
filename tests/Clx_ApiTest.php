<?php

require_once __DIR__ . '/../clxapi/Clx_Api.php';

class Clx_ApiTest extends PHPUnit_Framework_TestCase {

    public $Clx_Api;

    public function setUp()
    {

        $config = array(
            'username' => 'username',
            'password'=> 'password'
        );

        $httpAdapter = new Clx_Http_AdapterTest();
        $this->Clx_Api = new Clx_Api( $config, $httpAdapter );
        $this->Clx_Api->setBaseURI('https://clx-aws.clxnetworks.com/api');

    }


    public function testValidConstruct()
    {
        $this->assertInstanceOf('Clx_Api', $this->Clx_Api);
    }


    /**
     * @expectedException Clx_Exception
     */
    public function testSetBaseURIThrowsIfNotString()
    {
        $this->Clx_Api->setBaseURI( 1 );
    }


    /**
     * @expectedException Clx_Exception
     */
    public function testGetOperatorsByIdThrowsIfNotInteger()
    {
        $this->Clx_Api->getOperatorById( 'string' );
    }

    /**
     * @todo Should i test assertEquals on ex getBody, getHeaders to?
     */
    public function testGetOperatorsReturnClx_Http_ResponseObject()
    {

        $response = $this->Clx_Api->getOperators();

        if( $response instanceof Clx_Http_Response )
        {
            $this->assertEquals( 200, $response->getStatusCode() );
        }
        else
        {
            $this->fail( 'Expected Clx_Http_Response, got something else!' );
        }
    }


    public function testGetOperatorsByIdReturnClx_Http_ResponseObject()
    {
        $response = $this->Clx_Api->getOperatorById( 10 );

        if( $response instanceof Clx_Http_Response )
        {
            $this->assertEquals( 200, $response->getStatusCode() );
        }
        else
        {
            $this->fail( 'Expected Clx_Http_Response, got something else!' );
        }
    }



}