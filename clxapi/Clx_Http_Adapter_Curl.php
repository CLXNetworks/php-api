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
        $this->setOpt(CURLINFO_HEADER_OUT, true);
    }

    /**
     * @param string $username
     * @param string $password
     */
    private function _setAuthOpts( $username, $password )
    {
        $this->setOpt( CURLOPT_USERPWD, $username . ':' . $password );
    }

    public function get( $username, $password, $url )
    {
        $this->_setAuthOpts( $username, $password );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url));

        return $this->execute();
    }

    /**
     * @todo Not complete
     */
    public function post( $username, $password, $url, $data = null )
    {
        $this->_setAuthOpts( $username, $password );
        $this->setOpt(CURLOPT_URL, $this->buildURL($url));
        $this->setOpt(CURLOPT_POST, true);

        if (!empty($data)) {
            $this->setOpt(CURLOPT_POSTFIELDS, json_encode($data));
        }

        return $this->execute();
    }

    /**
     * @todo Not complete
     */
    public function put()
    {
        $this->_setAuthOpts( $username, $password );
    }

    /**
     * @todo Not complete
     */
    public function delete()
    {
        $this->_setAuthOpts( $username, $password );
    }

    /**
     * @return Clx_Http_Response
     */
    private function execute()
    {
        $ch = curl_init();

        curl_setopt_array($ch, $this->getOpt());

        $body = curl_exec($ch);
        $headers = curl_getinfo($ch, CURLINFO_HEADER_OUT);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $error = curl_error($ch);


        curl_close($ch);

        require_once 'Clx_Http_Response.php';
        return new Clx_Http_Response( $body, $headers, $statusCode, $error );
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