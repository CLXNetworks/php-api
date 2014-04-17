<?php

require_once 'Clx_Http_Response.php';

class Curl {

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
    }

    /** 
     * @param  string
     * @return Clx_Http_Response
     */
    public function get($url) {

        $ch = curl_init();

        $this->setOpt(CURLOPT_URL, $this->buildURL($url), $ch);
        $this->setOpt(CURLOPT_RETURNTRANSFER, true, $ch);
        $this->setOpt(CURLOPT_USERPWD, $this->username . ':' . $this->password, $ch);

        curl_setopt_array($ch, $this->options);

        return $this->execute($ch);

    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

    /**
     * @param  resource (curl handler)
     * @return Clx_Http_Response    
     */
    private function execute($ch) {

        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   
        $error = curl_error($ch);
        curl_close($ch);

        $response = new Clx_Http_Response($data, $code, $error);

        return $response;
    }



    /**
     * @param const
     * @param mixed
     * @param resource (curl handler)
     */
    public function setOpt($option, $value, $ch) {
        
        $this->options[$option] = $value;
    }


    /**
     * @param  string
     * @param  array
     * @return string
     */
    public function buildURL($url, $data = array()) {

        if(empty($data)) {
            return $url;
        }
        else {
            return $url . '?' . http_build_query($data);
        }
    }




    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
}