<?php

require_once __DIR__ . '/../clxapi/Curl.php';

class CurlTest extends PHPUnit_Framework_TestCase {

    public $curl;

    public function setUp() {
        $this->curl = new Curl('username', 'password');
    }

    public function testConstruct() {
        
    }

    //test get
    
    //test post
    
    //test put
    
    //test delete

}

