<?php

require_once 'Clx_Http_Client.php';

class ClxApi {

    private $username;

    private $password;

    private $http_client;

    /**
     * Deafault Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        $this->http_client = new Clx_Http_Client($this->username, $this->password);
    }

    /**
     * Get All Operators
     * /api/operator/
     */
    public function getOperators() {

        $HTTPrequest = $this->http_client;
        $HTTPrequest->setURI('https://clx-aws.clxnetworks.com/api/operator');
        $operators = $HTTPrequest->doRequest('GET');

        return $operators;

    }

    /**
     * Get a specific operator by id
     * @param  string
     */
    public function getOperatorsById($operator_id) {

        if(is_numeric($operator_id)) {

            $HTTPrequest = $this->http_client;
            $HTTPrequest->setURI('https://clx-aws.clxnetworks.com/api/operator/' . $operator_id);
            $operator = $HTTPrequest->doRequest('GET');

            return $operator;
        } 
        else {
            throw new Exception("operator_id must be an integer");
        }

        

    }

}