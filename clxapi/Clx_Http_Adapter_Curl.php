<?php

require_once 'Clx_Http_Response.php';

class Clx_Http_Adapter_Curl {

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $options;

    /** 
     * Default Constructor
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        // Set the minumum required curl options
        $this->setOpt(CURLOPT_RETURNTRANSFER, true);
        $this->setOpt(CURLOPT_USERPWD, $this->username . ':' . $this->password);
    }

    /** 
     * @param  string
     * @return array
     */
    public function get($url) {

        $this->setOpt(CURLOPT_URL, $this->buildURL($url));
        return $this->execute();
    }

    /** 
     * @param  string
     * @param  array
     * @return array
     */
    public function post($url, $data = null) { 

        $this->setOpt(CURLOPT_URL, $this->buildURL($url));
        $this->setOpt(CURLOPT_POST, true);

        if (!empty($data)) {
            $this->setOpt(CURLOPT_POSTFIELDS, json_encode($data));
        }
        
        return $this->execute();
    }

    public function put() {

    }

    public function delete() {

    }

    /**
     * @param  resource CurlHandler
     * @return array    
     */
    private function execute() {

        $ch = curl_init();

        curl_setopt_array($ch, $this->options);

        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   
        $error = curl_error($ch);
        curl_close($ch);

        $response = array('data' => $data, 'code' => $code, 'error' => $error);

        return $response;
    }

    /**
     * @param const
     * @param mixed
     */
    private function setOpt($option, $value) {
        
        $this->options[$option] = $value;
    }


    /**
     * @param  string
     * @param  array
     * @return string
     */
    private function buildURL($url, $data = array()) {

        if(empty($data)) {
            return $url;
        }
        else {
            return $url . '?' . http_build_query($data);
        }
    }

}