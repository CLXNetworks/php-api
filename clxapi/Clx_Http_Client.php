<?php

require_once 'Clx_Http_Adapter_Curl.php';
require_once '../apitestapplication/api.php';

class Clx_Http_Client extends Clx_Http_Adapter_Curl{

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
     * @return  void
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;

        parent::__construct($this->username, $this->password);
    }

    /**
     * @param string
     * @return  void
     */
    public function setURI($uri) {
        $this->uri = $uri;
    }

    /**
     * @param  string
     * @return Clx_Http_Response
     */
    public function request($method, $data = null) {
        //$request = new Clx_Http_Adapter_Curl($this->username, $this->password);

        $result;

        if($method == 'GET') {
            //$result = $request->get($this->uri);
            
            $result = $this->get($this->uri);

            /* Only For Test locally*/
            //$api= new api();
            //$result = $api->simulateRequest($this->uri);
        }

        if($method == 'POST') {
            $result = $request->post($this->uri, $data);
        }

        return new Clx_Http_Response($result['data'], $result['code'], $result['error']);;
    }
}