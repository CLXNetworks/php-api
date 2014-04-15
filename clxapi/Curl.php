<?php

class Curl {

    private $username = '';

    private $password = '';

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    /** 
     * @param  string
     */
    public function get($url) {

        $ch = curl_init();

        $options = array(
                        CURLOPT_URL => $url,
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_USERPWD => $this->username . ':' . $this->password
                        );

        curl_setopt_array($ch, $options);

        return $this->execute($ch);

    }

    public function post() {

    }

    public function put() {

    }

    public function delete() {

    }

    /**
     * @param  Object $ch
     */
    public function execute($ch) {

        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }
}