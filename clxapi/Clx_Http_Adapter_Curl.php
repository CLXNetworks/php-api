<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Adapter_Interface.php';

class Clx_Http_Adapter_Curl implements Clx_Http_Adapter_Interface {

    /**
     * @var string
     */
    private $options;

    /** 
     * Default Constructor
     */
    public function __construct()
    {
        // Set the minimum required curl options
        $this->setOpt(CURLOPT_RETURNTRANSFER, true);
        $this->setOpt(CURLOPT_HEADER, true);
    }

    /**
     * @param array $auth
     */
    private function _setAuthOpts( $auth )
    {
        if (is_array( $auth ))
        {
            $this->setOpt( CURLOPT_USERPWD, $auth['username'] . ':' . $auth['password'] );
        }

    }

    public function get( $auth = null, $url )
    {
        $this->_setAuthOpts( $auth );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url));

        return $this->execute();
    }

    public function post( $auth, $url, $data = null )
    {
        $this->_setAuthOpts( $auth );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url));
        $this->setOpt(CURLOPT_POST, true);

        if (!empty($data)) {

            $data = http_build_query($data);
            $this->setOpt(CURLOPT_POSTFIELDS, $data);
        }

        return $this->execute();
    }


    public function put( $auth, $url, $data = null )
    {
        $this->_setAuthOpts( $auth );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url));
        $this->setOpt(CURLOPT_CUSTOMREQUEST, 'PUT');

        if (!empty($data)) {

            $put_Data = http_build_query($data);
            $this->setOpt(CURLOPT_POSTFIELDS, $put_Data);
        }

        return $this->execute();

    }


    public function delete( $auth, $url, $data = null )
    {
        $this->_setAuthOpts( $auth );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url, $data));
        $this->setOpt(CURLOPT_CUSTOMREQUEST, 'DELETE');

        if (!empty($data)) {

            $put_Data = http_build_query($data);
            $this->setOpt(CURLOPT_POSTFIELDS, $put_Data);
        }

        return $this->execute();
    }

    /**
     * @return Clx_Http_Response
     */
    private function execute()
    {
        $ch = curl_init();

        curl_setopt_array($ch, $this->getOpt());

        $response = curl_exec($ch);
        
        // Separates headers and body
        list($headers, $body) = explode("\r\n\r\n", $response, 2);

        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);

        curl_close($ch);

        require_once 'Clx_Http_Response_Json.php';
        return new Clx_Http_Response_Json( $body, $headers, $statusCode, $error );
    }

    /**
     * @param const
     * @param mixed $value
     */
    private function setOpt($option, $value)
    {
        $this->options[$option] = $value;
    }

    /**
     * @return array
     */
    private function getOpt()
    {
        return $this->options;
    }

    /**
     * @param  string
     * @param  array
     * @return string
     */
    private function buildURL($url, $data = array())
    {
        if(empty($data))
        {
            return $url;
        }
        else
        {
            return $url . '?' . http_build_query($data);
        }
    }

}