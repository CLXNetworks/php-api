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

        $this->assertContainsOnlyInstancesOf( 'stdClass', $response );
        $this->assertInternalType( 'array', $response );
        $this->assertEquals( 3, count( $response ) );
        $this->assertEquals( 'John Doe Mobile', $response[0]->name );
        //@todo Borde jag testa alla attribut här?
    }

    //@todo hur testa GetOperators Fail



    public function testGetOperatorByIdSuccess()
    {
        $response = $this->Clx_Api->getOperatorById( 1 );

        if( $response instanceof stdClass )
        {
            $this->assertEquals( 'John Doe Mobile', $response->name );

            //@todo Borde jag testa alla attribut här?
        }
        else
        {
            $this->fail( 'Expected Clx_Http_Response, got something else!' );
        }
    }


    public function testGetOperatorByIdThatNotExists()
    {
        try
        {
            $this->Clx_Api->getOperatorById( 9999 );
            $this->fail( 'Never want to get here!' );
        }
        catch( Clx_Exception $e )
        {
            $this->assertEquals( 'Message: Could not find operator with id: 9999 Code: 3001', $e->getMessage() );
        }
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


    public function testGetGatewaysSuccess()
    {
        $response = $this->Clx_Api->getGateways();

        $this->assertContainsOnlyInstancesOf( 'stdClass', $response );
        $this->assertInternalType( 'array', $response );
        $this->assertEquals( 3, count( $response ) );
        $this->assertEquals( 'Supp1', $response[0]->name );
        //@todo Borde jag testa alla attribut här?
    }

    public function testGetGatewayByIdSuccess()
    {
        $response = $this->Clx_Api->getGatewayById( 1 );

        if( $response instanceof stdClass )
        {
            $this->assertEquals( 'Supp1', $response->name );

            //@todo Borde jag testa alla attribut här?
        }
        else
        {
            $this->fail( 'Expected Clx_Http_Response, got something else!' );
        }
    }




}