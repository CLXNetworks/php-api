<?php


class Clx_Http_Adapter_CurlTest extends PHPUnit_Framework_TestCase {

    public function testValidConstruct()
    {
        $Clx_Http_Adapter_Curl = new Clx_Http_Adapter_Curl();

        $this->assertInstanceOf( 'Clx_Http_Adapter_Curl', $Clx_Http_Adapter_Curl );
    }

    public  function testGet()
    {
        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }

    public function testPost()
    {
        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }

    public function testPut()
    {
        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }

    public function testDelete()
    {
        $this->markTestIncomplete( 'This test has not been implemented yet.' );
    }
}
 