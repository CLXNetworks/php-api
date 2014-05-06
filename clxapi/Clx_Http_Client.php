<?php

require_once 'Clx_Http_Adapter_Curl.php';

class Clx_Http_Client {

    /**
     * @var string
     */
    private $uri;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var Clx_Http_Adapter_Interface
     */
    private $_httpAdapter = null;

    /**
     * Default Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {
        $this->setUsername( $username );
        $this->setPassword( $password );
    }

    /**
     * @param string $username
     * @throws Clx_Exception
     */
    public function setUsername( $username ) {

        if( is_string( $username ) )
        {
            $this->username = $username;
        }
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Username must be of type String!' );
        }
    }

    /**
     * @param string $password
     * @throws Clx_Exception
     */
    public function setPassword( $password ) {

        if( is_string( $password ) )
        {
            $this->password = $password;
        }
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Password must be of type String!' );
        }
    }

    /**
     * @return string
     */
    private function _getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    private function _getPassword()
    {
        return $this->password;
    }

    /**
     * @param Clx_Http_Adapter_Interface $httpAdapter
     * @throws Clx_Exception
     */
    public function setHttpAdapter( Clx_Http_Adapter_Interface $httpAdapter)
    {
        if( is_null( $this->_httpAdapter) )
        {
            $this->_httpAdapter = $httpAdapter;
        }
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Http Adapter already set!' );
        }
    }

    /**
     * @return Clx_Http_Adapter_Interface
     */
    private function _getHttpAdapter()
    {
        return $this->_httpAdapter;
    }

    /**
     * @param string
     * @throws Clx_Exception
     * @return  void
     */
    public function setURI($uri) {

        if( is_string( $uri ) )
        {
            $this->uri = $uri;
        }
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Uri must be of type String!' );
        }

    }

    /**
     * @return string
     */
    private function _getURI()
    {
        return $this->uri;
    }

    /**
     * @param  string $method
     * @param array $data
     * @throws Clx_Exception
     * @return Clx_Http_Response
     */
    public function request($method, $data = array() ) {


        if( !is_string( $method ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( '$method must be of type String!' );
        }

        if( !is_array( $data ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( '$data must be of type Array!' );
        }

        $httpAdapter = $this->_getHttpAdapter();
        $username = $this->_getUsername();
        $password = $this->_getPassword();
        $uri = $this->_getURI();


        if($method == 'GET')
        {
            return $httpAdapter->get( $username, $password, $uri );
        }

        if($method == 'POST')
        {
            return $httpAdapter->post( $username, $password, $uri, $data );
        }
    }


}

?>