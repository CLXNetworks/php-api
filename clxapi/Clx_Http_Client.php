<?php

require_once 'Clx_Http_Adapter_Curl.php';
require_once '../apitestapplication/api.php';

class Clx_Http_Client {

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
     * Default Constructor
     * @param string
     * @param string
     */
    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @param string
     * @return  void 
     */
    public function setURI($uri) {
        $this->uri = $uri;
    }

    /**
     * @param  string $method
     * @param array $data
     * @return Clx_Http_Response
     */
    public function request($method, $data = null) {
        $request = new Clx_Http_Adapter_Curl($this->username, $this->password);

        $result = '';

        if($method == 'GET') {
            $result = $request->get($this->uri);
            
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

?>