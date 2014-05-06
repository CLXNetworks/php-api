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
        $this->body = $body;
        $this->headers = $headers;
        $this->code = $code;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
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
     * @return int
     */
    public function getStatusCode()
    {
        return $this->code;
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

        require_once 'Clx_Exception.php';

        if( !is_string( $result['body'] ) )
        {
            throw new Clx_Exception( '$result["body"] "is not of type string!' );
        }

        if( !is_string( $result['headers'] ) )
        {
            throw new Clx_Exception( '$result["headers"] "is not of type string!' );
        }

        if( !is_integer( $result['code'] ) )
        {
            throw new Clx_Exception( '$result["code"] "is not of type string!' );
        }

        if( !is_string( $result['error'] ) )
        {
            throw new Clx_Exception( '$result["error"] "is not of type string!' );
        }

        return new Clx_Http_Response( $result['body'], $result['headers'], $result['code'], $result['error'] );
    }

}

?>