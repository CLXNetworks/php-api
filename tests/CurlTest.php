<?php

require_once __DIR__ . '/../clxapi/Curl.php';

class CurlTest extends PHPUnit_Framework_TestCase {

    public $curl;

    public function setUp() {
        $this->curl = new Curl('username', 'password');
    }

    public function testConstruct() {
        
    }

    public function testUsernameIsSet() {

        $c = $this->curl;
        $result = $c->getUsername();

        $this->assertEquals('username', $result);
    }

    public function testPasswordIsSet() {

        $c = $this->curl;
        $result = $c->getPassword();

        $this->assertEquals('password', $result);
    }

    public function testUsernameIsString() {
        $c = $this->curl;
        $result = $c->getUsername();

        $this->assertInternalType('string', $result);
    }

    public function testPasswordIsString() {
        $c = $this->curl;
        $result = $c->getPassword();

        $this->assertInternalType('string', $result);
    }

}

