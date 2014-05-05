<?php

interface Clx_Http_Adapter_Interface
{
    /**
     * @param string $username
     * @param string $password
     * @param string $url
     * @return Clx_Http_Response
     */
    public function get( $username, $password, $url );

    /**
     * @param string $url
     * @param array $data
     * @return array
     */
    public function post( $url, $data = null );

    public function put();

    public function delete();


}

?>