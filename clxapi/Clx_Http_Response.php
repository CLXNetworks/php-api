<?php

class Clx_Http_Response {

    /**
     * @var string
     */
    private $data;

    /**
     * @var int
     */
    private $code;

    /**
     * @var string
     */
    private $error;

    /** 
     * Default Constructor
     */
    public function __construct($data, $code, $error) {
        $this->data = $data;
        $this->code = $code;
        $this->error = $error;
    }

    /**
     * @return string
     */
    public function getData() {

        //Should the json_decode be done here?
        return $this->data;
    }

    /**
     * @return int
     */
    public function getStatusCode() {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getError() {
        return $this->error;
    }

}

?>