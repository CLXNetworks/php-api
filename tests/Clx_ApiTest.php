<?php

require_once __DIR__ . '/../clxapi/Clx_Api.php';

class Clx_ApiTest extends PHPUnit_Framework_TestCase {

    public $Clx_Api;

    public function setUp()
    {
        $httpAdapter = new Clx_Http_AdapterTest();

        $config = array(
            'username' => 'username',
            'password'=> 'password',
            'baseURL' => 'https://clx-aws.clxnetworks.com/api',
            'httpAdapter' => $httpAdapter
        );


        $this->Clx_Api = new Clx_Api( $config );
    }

    //test construct




    //test setBaseURI
    /**
     * @expectedException Clx_Exception
     */
    public function testSetBaseURIThrowsClx_ExceptionIfNotString()
    {
        $this->Clx_Api->setBaseURI( 1 );
    }


    //test getOperators

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




    //test getOperatorsById
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


    /**
     * @expectedException Clx_Exception
     */
    public function testGetOperatorsByIdThrowsClx_ExceptionIfNotInteger()
    {
        $this->Clx_Api->getOperatorById( 'string' );
    }
    

}