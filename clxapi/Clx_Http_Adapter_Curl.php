<?php

require_once 'Clx_Http_Response.php';

class Clx_Http_Adapter_Curl {

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
    }

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
    public function post($url, $data = null)
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

        curl_setopt_array($ch, $this->options);

        $data = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);   
        $error = curl_error($ch);
        curl_close($ch);

        require_once 'Clx_Http_Response.php';
        return new Clx_Http_Response( $data, $code, $error );
    }

    /**
     * @param const
     * @param mixed
     */
    private function setOpt($option, $value)
    {
        $this->options[$option] = $value;
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