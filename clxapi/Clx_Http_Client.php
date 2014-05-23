<?php

require_once 'Clx_Http_Adapter_Curl.php';

class Clx_Http_Client {

    /**
     * @var string
     */
    private $uri;


    /**
     * @var array|null
     */
    private $auth;


    /**
     * @var Clx_Http_Adapter_Interface
     */
    private $_httpAdapter = null;

    /**
     * Default Constructor
     */
    public function __construct() {

    }

    /**
     * @param string $username
     * @param string $password
     * @throws Clx_Exception
     */
    public function setAuth( $username, $password )
    {
        if ($username === false || $username === null)
        {
            $this->auth = null;
        }
        else
        {
            if (!is_string( $username ) || !is_string( $password ))
            {
                require_once 'Clx_Exception.php';
                throw new Clx_Exception( 'Username and Password must be of type string!' );
            }

            $this->auth = array(
                'username'  =>  $username,
                'password'  =>  $password
            );
        }
    }

    /**
     * @return array|null
     */
    private function _getAuth()
    {
        return $this->auth;
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
            throw new Clx_Exception( 'Parameter value must be of type "string"' );
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
            throw new Clx_Exception( 'Parameter value must be of type "string"' );
        }

        if( !is_array( $data ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Parameter value must be of type "string"' );
        }

        $httpAdapter = $this->_getHttpAdapter();
        $auth = $this->_getAuth();
        $uri = $this->_getURI();


        if($method == 'GET')
        {
            //@todo borde data parameter användas för att skcika med parametrar, tex date?
            return $httpAdapter->get( $auth, $uri );
        }

        if($method == 'POST')
        {
            return $httpAdapter->post( $auth, $uri, $data );
        }
    }


}

?>