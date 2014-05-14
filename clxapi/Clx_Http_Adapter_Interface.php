<?php

interface Clx_Http_Adapter_Interface
{
    /**
     * @param string $username
     * @param string $password
     * @param string $url
     * @return Clx_Http_Response
     */
    public function get( $auth, $url );

    /**
     * @param string $username
     * @param string $password
     * @param string $url
     * @param array $data
     * @return array
     */
    public function post( $auth, $url, $data = null );

    public function put();

    public function delete();


}

?>