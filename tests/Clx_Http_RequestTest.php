<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Request.php';

class Clx_Http_RequestTest extends PHPUnit_Framework_TestCase {

    public $Clx_Http_Request;

    public function setUp() {
        $this->Clx_Http_Request = new Clx_Http_Request('username', 'password');
    }

    //test construct

    //test setURI

    //test doRequest

}