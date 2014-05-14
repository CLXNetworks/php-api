<?php

require_once 'Clx_Http_Client.php';

class Clx_Api {


    /**
     * @var string
     */
    private $baseURI;

    /**
     * @var Clx_Http_Client
     */
    private $httpClient;

    /**
     * Default Constructor
     * @param array|null $config
     * @param null|Clx_Http_Adapter_Interface $httpAdapter
     * @todo not sure if adapter should be set in construct of Clx_Api
     */
    public function __construct( $config = null, $httpAdapter = null )
    {
        $this->httpClient = new Clx_Http_Client();
        $this->_setHttpAdapter( $httpAdapter );

        if ( $config !== null )
        {
            $this->httpClient->setAuth( $config['username'], $config['password'] );
        }


    }

    /**
     * @param null|Clx_Http_Adapter_Interface $httpAdapter
     * If no adapter is provided, set the httpAdapter to Clx_Http_Adapter_Curl
     */
    private function _setHttpAdapter( $httpAdapter )
    {
        if ( $httpAdapter !== null )
        {
            $this->httpClient->setHttpAdapter( $httpAdapter );
        }
        else
        {
            $this->httpClient->setHttpAdapter( new Clx_Http_Adapter_Curl() );
        }
    }

    /**
     * @param string $url
     * @throws Clx_Exception
     */
    public function setBaseURI( $url )
    {
        if( !is_string( $url ) )
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'URL must be of type String!' );
        }

        $this->baseURI = $url;
    }

    /**
     * @return string
     */
    private function _getBaseURI()
    {
        return $this->baseURI;
    }

    /**
     * Get All Operators
     * /api/operator/
     */
    public function getOperators()
    {
        $this->httpClient->setURI( $this->_getBaseURI() . '/operator' );
        $operators = $this->httpClient->request( 'GET' );

        return $operators;
    }

    /**
     * Get a specific operator by id
     * @param  int
     * @return operator
     * @throws Exception
     */
    public function getOperatorById( $operator_id )
    {

        if( is_numeric( $operator_id ) )
        {
            $this->httpClient->setURI( $this->_getBaseURI() . '/operator/' . $operator_id) ;
            $operator = $this->httpClient->request( 'GET' );

            return $operator;
        } 
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Operator_id must be an integer!' );
        }
    }


}

?>