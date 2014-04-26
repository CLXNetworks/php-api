<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Response.php';

class Clx_Http_ResponseTest extends PHPUnit_Framework_TestCase {

    public $Clx_Http_Response;

    public function setUp() {
        $this->Clx_Http_Response = new Clx_Http_Response('username', 'password');
    }

    //test construct

    //test getData

    //test getStatusCode
    
    //test getError

}