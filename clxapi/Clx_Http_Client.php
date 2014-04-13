<?php

require_once 'Curl.php';

class Clx_Http_Client {

    private $uri = '';

    private $username = '';

    private $password = '';

    private $curl = '';

    /**
     * Deafault Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        $this->curl = new Curl($this->username, $this->password);
    }

    /**
     * @param string
     */
    public function setURI($uri) {
        $this->uri = $uri;
    }

    /**
     * @param  string
     */
    public function doRequest($method) {
        $request = $this->curl;

        $result = '';

        if($method == 'GET') {
            $result = $request->get($this->uri);
        }
        
        return $result;
    }
}