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
     * @param $http_response Clx_Http_Response
     * @throws Clx_Exception
     * @return $result stdClass
     */
    private function generateResult( $http_response )
    {
        $result = $http_response->getJsonDecodedBody();

        if ( !$http_response->isSuccessful() )
        {
            if ( property_exists( $result, 'error' ) )
            {
                require_once 'Clx_Exception.php';
                throw new Clx_Exception( 'Message: ' . $result->error->message . ' Code: ' .$result->error->code );
            }

            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Something went wrong with the request', $http_response );
        }

        return $result;
    }


    /**************
     * OPERATORS
     **************/

    /**
     * Get All Operators
     * GET /api/operator/
     * @return stdClass|Clx_Http_Response
     */
    public function getOperators()
    {
        $this->httpClient->setURI( $this->_getBaseURI() . '/operator' );
        $http_response = $this->httpClient->request( 'GET' );

        return $this->generateResult( $http_response );

    }

    /**
     * Get a specific operator by id
     * GET /api/operator/<operator id>/
     * @param  int
     * @return stdClass|Clx_Http_Response
     * @throws Exception
     */
    public function getOperatorById( $operator_id )
    {

        if( is_numeric( $operator_id ) )
        {
            $this->httpClient->setURI( $this->_getBaseURI() . '/operator/' . $operator_id) ;
            $http_response = $this->httpClient->request( 'GET' );

            return $this->generateResult( $http_response );

        } 
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'Operator_id must be an integer!' );
        }
    }




    /**************
     * GATEWAYS
     **************/


    /*
    List all gateways
    GET /api/gateway/

    public function getGateways()
    {

    }
    */

    /*
    List a single gateway
    GET /api/gateway/<gateway id>

    public function getGatewayById()
    {

    }
    */


    /**************
     * Price Entries
     **************/

    /*
    List all price entries for all operators on a specific gateway
    GET /api/gateway/<gateway id>/price

    public function getPriceEntriesForAllOperatorsByGateway()
    {

    }
    */

    /*
    List price entries for a single operator on a specific gateway
    GET /api/gateway/<gateway id>/price/<operator>/

    public function getPriceEntriesForSingleOperatorByGateway()
    {

    }
    */

    /*
    List price entries for a specific gateway, operator and date
    GET /api/gateway/<gateway id>/price/<operator>/?date=<date>

    public function getPriceEntriesForSpecificGatewayOperatorDate()
    {

    }
    */


}

?>