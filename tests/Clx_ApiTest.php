<?php

require_once __DIR__ . '/../clxapi/Clx_Api.php';

class Clx_ApiTest extends PHPUnit_Framework_TestCase {

    public $Clx_Api;

    public function setUp()
    {

        $config = array(
            'username' => 'username',
            'password'=> 'password'
        );

        $httpAdapter = new Clx_Http_AdapterTest();
        $this->Clx_Api = new Clx_Api( $config, $httpAdapter );
        $this->Clx_Api->setBaseURI('https://clx-aws.clxnetworks.com/api');

    }


    public function testValidConstruct()
    {
        $this->assertInstanceOf('Clx_Api', $this->Clx_Api);
    }


    /**
     * @expectedException Clx_Exception
     */
    public function testSetBaseURIThrowsIfNotString()
    {
        $this->Clx_Api->setBaseURI( 1 );
    }


    /**
     * @expectedException Clx_Exception
     */
    public function testGetOperatorsByIdThrowsIfNotInteger()
    {
        $this->Clx_Api->getOperatorById( 'string' );
    }





    public function testGetOperatorsSuccess()
    {
        $response = $this->Clx_Api->getOperators();

        $this->assertContainsOnlyInstancesOf('stdClass', $response);
        $this->assertInternalType( 'array', $response);
        $this->assertEquals( 3, count($response));
    }








    public function testGetOperatorByIdSuccess()
    {
        $response = $this->Clx_Api->getOperatorById( 1 );

        if( $response instanceof stdClass )
        {
            $this->assertEquals('John Doe Mobile', $response->name);

            //@todo Borde jag testa alla attribut här?
        }
        else
        {
            $this->fail( 'Expected Clx_Http_Response, got something else!' );
        }
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testGetOperatorByIdThatNotExists()
    {
        $this->Clx_Api->getOperatorById( 9999 );
    }

    /**
     * @expectedException Clx_Exception
     */
    public function testGetOperatorByIdWithUnknownErrorThrows()
    {
        $this->Clx_Api->getOperatorById( 9998 );
    }

    public function testGetOperatorByIdWithUnknownErrorCanAccessResponseObject()
    {
        try
        {
            $this->Clx_Api->getOperatorById( 9998 );
        }
        catch( Clx_Exception $e )
        {
            $this->assertInstanceOf( 'Clx_Http_Response', $e->getResponseObject());
        }



    }






}