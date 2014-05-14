<?php

class Clx_Http_Response {

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $headers;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var string
     */
    private $error;

    /** 
     * Default Constructor
     */
    public function __construct($body, $headers, $statusCode, $error)
    {

        $this->_setBody( $body );
        $this->_setHeaders( $headers );
        $this->_setStatusCode( $statusCode );
        $this->_setError( $error );

    }

    /**
     * @param string $body
     * @throws Clx_Exception
     */
    private function _setBody( $body )
    {
        if( !is_string( $body ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'body is not of type string!' );
        }

        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $headers
     * @throws Clx_Exception
     */
    private function _setHeaders( $headers )
    {
        if( !is_string( $headers ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'headers is not of type string!' );
        }

        $this->headers = $headers;
    }

    /**
     * @return string
     * @TODO parse headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param string $statusCode
     * @throws Clx_Exception
     */
    private function _setStatusCode( $statusCode )
    {
        if( !is_integer( $statusCode ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'statusCode is not of type string!' );
        }

        $this->statusCode = $statusCode;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param string $error
     * @throws Clx_Exception
     */
    private function _setError( $error )
    {
        if( !is_string( $error ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'error is not of type string!' );
        }

        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    public static function generateResponse( array $result )
    {
        return new Clx_Http_Response( $result['body'], $result['headers'], $result['statusCode'], $result['error'] );
    }

}

?>