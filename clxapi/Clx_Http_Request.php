<?php

require_once 'Curl.php';

class Clx_Http_Request {

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
     * Deafault Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param string
     */
    public function setURI($uri) {
        $this->uri = $uri;
    }

    /**
     * @param  string
     * @return  Clx_Http_Response
     */
    public function doRequest($method) {
        $request = new Curl($this->username, $this->password);

        $result = '';

        if($method == 'GET') {
            $result = $request->get($this->uri);
        }
        
        return $result;
    }
}