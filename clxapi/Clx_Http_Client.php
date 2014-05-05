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
        $this->username = $username;
        $this->password = $password;
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
     * @return  void 
     */
    public function setURI($uri) {
        $this->uri = $uri;
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
     * @return Clx_Http_Response
     */
    public function request($method, $data = null) {

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
            return $httpAdapter->post( $uri, $data );
        }
    }


}

?>