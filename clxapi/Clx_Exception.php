<?php

class Clx_Exception extends Exception
{

    private $Clx_Http_Response;

    public function __construct( $message = '', Clx_Http_Response $responseObject = NULL, $code = 0, Exception $previous = NULL )
    {
        $this->Clx_Http_Response = $responseObject;
        parent::__construct( $message, $code, $previous );
    }

    public function getResponseObject()
    {
        return $this->Clx_Http_Response;
    }

}
?>