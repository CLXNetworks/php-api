<?php

class Clx_Http_Response {

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $rawHeaders;

    /**
     * @var array
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
     * @param string $body
     * @param string $rawHeaders
     * @param int $statusCode
     * @param string $error
     */
    public function __construct($body, $rawHeaders, $statusCode, $error)
    {
        $this->_setBody( $body );
        $this->_setRawHeaders( $rawHeaders );
        $this->_setHeaders( $rawHeaders );
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
     * @param string $rawHeaders
     * @throws Clx_Exception
     */
    private function _setRawHeaders( $rawHeaders )
    {
        if( !is_string( $rawHeaders ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'parameter is not of type string!' );
        }

        $this->rawHeaders = $rawHeaders;
    }

    /**
     * @param string $rawHeaders
     * @throws Clx_Exception
     * @TODO parse headers here ?
     */
    private function _setHeaders( $rawHeaders )
    {
        if( !is_string( $rawHeaders ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'parameter is not of type string!' );
        }

        $this->headers =  $this->parseHeaders($rawHeaders);
    }

    /**
     * @return string
     */
    public function getRawHeaders()
    {
        return $this->rawHeaders;
    }

    /**
     * @return array
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


    /**
     * @return bool
     */
    public function isSuccessful()
    {
        if ( $this->statusCode >= 200 && $this->statusCode < 400 )
        {
            return true;
        }

        return false;
    }

    public static function generateResponse( array $result )
    {
        return new Clx_Http_Response_Json( $result['body'], $result['headers'], $result['statusCode'], $result['error'] );
    }

    /**
     * @param string $rawHeaders
     * @return array $httpHeaders
     * @todo should this class parse headers
     */
    private function parseHeaders($rawHeaders)
    {

        $rawHeaders = preg_split('/\r\n/', $rawHeaders, null, PREG_SPLIT_NO_EMPTY);
        $httpHeaders = array();

        for ($i = 1; $i < count($rawHeaders); $i++) {

            list($key, $value) = explode(':', $rawHeaders[$i], 2);
            $key = trim($key);
            $value = trim($value);

            if (array_key_exists( $key, $httpHeaders )) {
                $httpHeaders[$key] .= ',' . $value;
            } else {
                $httpHeaders[$key] = $value;
            }
        }

        return $httpHeaders;
    }

}

?>