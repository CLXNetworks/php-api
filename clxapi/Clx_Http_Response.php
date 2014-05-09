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
    private $code;

    /**
     * @var string
     */
    private $error;

    /** 
     * Default Constructor
     */
    public function __construct($body, $headers, $code, $error)
    {
        $this->_setbody( $body );
        $this->_setHeaders( $headers );
        $this->_setCode( $code );
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

        $this->$body = $body;
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
     * @param string $code
     * @throws Clx_Exception
     */
    private function _setCode( $code )
    {
        if( !is_integer( $code ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'code is not of type string!' );
        }

        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->code;
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
        return new Clx_Http_Response( $result['body'], $result['headers'], $result['code'], $result['error'] );
    }

}

?>