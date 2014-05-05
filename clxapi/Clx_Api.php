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
    private $http_Client;

    /**
     * Default Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {

        $this->http_Client = new Clx_Http_Client($username, $password);
    }

    public function setBaseURI($url) {
        $this->baseURI = $url;
    }

    /**
     * Get All Operators
     * /api/operator/
     */
    public function getOperators() {

        $HTTPRequest = $this->http_Client;
        $HTTPRequest->setURI($this->baseURI . '/operator');
        $operators = $HTTPRequest->request('GET');

        return $operators;

    }
    /**
     * Get a specific operator by id
     * @param  int
     * @return operator
     * @throws Exception
     */
    public function getOperatorsById($operator_id) {

        if(is_numeric($operator_id)) {

            $HTTPRequest = $this->http_Client;
            $HTTPRequest->setURI($this->baseURI . '/operator/' . $operator_id);
            $operator = $HTTPRequest->request('GET');

            return $operator;
        } 
        else {
            throw new Exception("operator_id must be an integer");
        }
    }


}

?>