<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Adapter_Interface.php';

class Clx_Http_AdapterTest implements Clx_Http_Adapter_Interface
{

    private $_responseArray;

    public function __construct()
    {
        require_once 'Response_Array.php';
        $this->_responseArray = Response_array::$responseArray;
    }



    public function get( $username, $password, $url )
    {
        if( array_key_exists( $url, $this->_responseArray ) )
        {
            $result = $this->_responseArray[ $url ];

            require_once __DIR__ . '/../clxapi/Clx_Http_Response.php';
            return Clx_Http_Response::generateResponse( $result );
        }

        throw new Clx_Exception( 'Invalid request!' );

    }

    public function post( $username, $password, $url, $data = null )
    {

    }

    public function put()
    {

    }

    public function delete()
    {

    }
}