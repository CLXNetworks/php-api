<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Request.php';

class Clx_Http_RequestTest extends PHPUnit_Framework_TestCase {

    public $Clx_Http_Request;

    public function setUp() {
        $this->Clx_Http_Request = new Clx_Http_Request('username', 'password');
        $this->Clx_Http_Request->setURI('https://clx-aws.clxnetworks.com/api/operator/10');
    }

    //test construct

    //test setURI


    public function testdoRequestReturnClx_Http_responseObject() {
        
         $returnObj = $this->Clx_Http_Request->doRequest('GET');
         $this->assertInstanceOf('Clx_Http_Response', $returnObj);
    }

}