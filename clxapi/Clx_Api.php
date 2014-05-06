<?php

require_once 'Clx_Http_Client.php';

class Clx_Api extends Clx_Http_Client{


    /**
     * @var string
     */
    private $baseURI;

    /**
     * Default Constructor
     * @param string
     * @param string
     */
    public function __construct( $config )
    {
        parent::__construct( $config['username'], $config['password'] );
        parent::setHttpAdapter( $config['httpAdapter'] );
        $this->setBaseURI ( $config['baseURL'] );
    }


    /**
     * @param string $url
     * @throws Clx_Exception
     */
    public function setBaseURI( $url )
    {
        if( is_string( $url ) )
        {
            $this->baseURI = $url;
        }
        else
        {
            require_once 'Clx_Exception.php';
            throw new Clx_Exception( 'URL must be of type String!' );
        }

    }

    /**
     * Get All Operators
     * /api/operator/
     */
    public function getOperators()
    {
        parent::setURI( $this->baseURI . '/operator' );
        $operators = parent::request( 'GET' );

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
            parent::setURI( $this->baseURI . '/operator/' . $operator_id) ;
            $operator = parent::request( 'GET' );

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