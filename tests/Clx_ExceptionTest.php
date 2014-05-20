<?php

class Clx_ExceptionTest extends PHPUnit_Framework_TestCase
{

    public function testGetMessage()
    {
        try
        {
            throw new Clx_Exception( 'test' );
        }
        catch( Clx_Exception $e )
        {
            $this->assertEquals( 'test', $e->getMessage());
        }
    }

    public function testGetResponseObject()
    {
        $Clx_Http_Response = new Clx_Http_Response( 'body', 'rawHeaders', 400, '');

        try
        {
            throw new Clx_Exception( 'test', $Clx_Http_Response );
        }
        catch( Clx_Exception $e )
        {
            $this->assertInstanceOf( 'Clx_Http_Response', $e->getResponseObject() );
        }
    }

}
 