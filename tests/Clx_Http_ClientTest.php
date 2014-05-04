<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Client.php';

class Clx_Http_RequestTest extends PHPUnit_Framework_TestCase {

    public $Clx_Http_Client;

    public function setUp() {
        $this->Clx_Http_Client = new Clx_Http_Client('username', 'password');
        $this->Clx_Http_Client->setURI('https://clx-aws.clxnetworks.com/api/operator/10');
    }

    //test construct

    //test setURI


    public function testRequestReturnClx_Http_responseObject() {
        
         $returnObj = $this->Clx_Http_Client->request('GET');
         $this->assertInstanceOf('Clx_Http_Response', $returnObj);
    }

}