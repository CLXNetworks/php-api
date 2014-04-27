<?php

require_once 'Clx_Http_Request.php';

class ClxApi {

    /**
     * @var Clx_Http_Request
     */
    private $http_Request;

    /**
     * Deafault Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {

        $this->http_Request = new Clx_Http_Request($username, $password);
    }

    /**
     * Get All Operators
     * /api/operator/
     */
    public function getOperators() {

        $HTTPrequest = $this->http_Request;
        $HTTPrequest->setURI('https://clx-aws.clxnetworks.com/api/operator');
        $operators = $HTTPrequest->doRequest('GET');

        return $operators;

    }

    /**
     * Get a specific operator by id
     * @param  int
     */
    public function getOperatorsById($operator_id) {

        if(is_numeric($operator_id)) {

            $HTTPrequest = $this->http_Request;
            $HTTPrequest->setURI('https://clx-aws.clxnetworks.com/api/operator/' . $operator_id);
            $operator = $HTTPrequest->doRequest('GET');

            return $operator;
        } 
        else {
            throw new Exception("operator_id must be an integer");
        }
    }


}