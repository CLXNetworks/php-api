<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Client.php';

class Clx_Http_RequestTest extends PHPUnit_Framework_TestCase {

    private $Clx_Http_Client;

    public function setUp() {

        require_once 'Clx_Http_AdapterTest.php';
        $httpAdapter = new Clx_Http_AdapterTest();
        $this->Clx_Http_Client = new Clx_Http_Client( 'username', 'password' );
        $this->Clx_Http_Client->setHttpAdapter( $httpAdapter );
        $this->Clx_Http_Client->setURI('https://clx-aws.clxnetworks.com/api/operator/10');

    }

    //test construct

    //test setURI


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