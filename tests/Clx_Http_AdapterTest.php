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



    public function get( $auth, $url )
    {
        if( array_key_exists( $url, $this->_responseArray ) )
        {
            $result = $this->_responseArray[ $url ];

            require_once __DIR__ . '/../clxapi/Clx_Http_Response_Json.php';
            return Clx_Http_Response_Json::generateResponse( $result );
        }

        throw new Clx_Exception( 'Invalid request!' );

    }

    public function post( $auth, $url, $data = null )
    {

    }

    public function put()
    {

    }

    public function delete()
    {

    }
}