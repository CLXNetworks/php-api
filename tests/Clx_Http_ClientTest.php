<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Client.php';

class Clx_Http_ClientTest extends PHPUnit_Framework_TestCase {

    private $Clx_Http_Client;

    public function setUp() {

        require_once 'Clx_Http_AdapterTest.php';
        $httpAdapter = new Clx_Http_AdapterTest();
        $this->Clx_Http_Client = new Clx_Http_Client( 'username', 'password' );
        $this->Clx_Http_Client->setHttpAdapter( $httpAdapter );
        $this->Clx_Http_Client->setURI('https://clx-aws.clxnetworks.com/api/operator/10');

    }

    public function testInstance()
    {
        $this->assertInstanceOf('Clx_Http_Client', $this->Clx_Http_Client);
    }

    //test setUsername
    /**
     * @expectedException Clx_Exception
     */
    public function testSetUsernameThrowsClx_ExceptionIfParamIsNotString() {
        $this->Clx_Http_Client->setUsername( 1 );
    }

    //test setPassword
    /**
     * @expectedException Clx_Exception
     */
    public function testSetPasswordThrowsClx_ExceptionIfParamIsNotString() {
        $this->Clx_Http_Client->setPassword( 1 );
    }



    //test setHttpAdapter

    /**
     * @expectedException Clx_Exception
     */
    public function testSetHttpAdapterThrowsClx_ExceptionIfHttpAdapterIsAlreadySet()
    {
        $httpAdapter = new Clx_Http_AdapterTest();
        $this->Clx_Http_Client->setHttpAdapter( $httpAdapter );

    }



    //test setURI
    /**
     * @expectedException Clx_Exception
     */
    public function testSetURIThrowsClx_ExceptionIfParamIsNotString() {
        $this->Clx_Http_Client->setURI( 1 );
    }


    //test request

    /**
     * @expectedException Clx_Exception
     */
    public function testRequestThrowsClx_ExceptionIfMethodParamIsNotString()
    {
        $this->Clx_Http_Client->request( 1 );
    }


    public function testRequestReturnClx_Http_responseObject() {

        $response = $this->Clx_Http_Client->request( 'GET' );

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

?>