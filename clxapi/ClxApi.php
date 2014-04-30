<?php

require_once 'Clx_Http_Client.php';

class ClxApi {

    /**
     * @var string
     */
    private $baseURI;

    /**
     * @var Clx_Http_Client
     */
    private $http_Client;

    /**
     * Deafault Constructor
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

        $HTTPrequest = $this->http_Client;
        $HTTPrequest->setURI($this->baseURI . '/operator');
        $operators = $HTTPrequest->request('GET');

        return $operators;

    }

    /**
     * Get a specific operator by id
     * @param  int
     */
    public function getOperatorsById($operator_id) {

        if(is_numeric($operator_id)) {

            $HTTPrequest = $this->http_Client;
            $HTTPrequest->setURI($this->baseURI . '/operator/' . $operator_id);
            $operator = $HTTPrequest->request('GET');

            return $operator;
        } 
        else {
            throw new Exception("operator_id must be an integer");
        }
    }


}