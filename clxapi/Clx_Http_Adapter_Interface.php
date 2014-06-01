<?php

interface Clx_Http_Adapter_Interface
{
    /**
     * @param $auth
     * @param string $url
     * @return Clx_Http_Response
     */
    public function get( $auth, $url );

    /**
     * @param $auth
     * @param string $url
     * @param array $data
     * @return Clx_Http_Response
     */
    public function post( $auth, $url, $data = null );

    /**
     * @param $auth
     * @param string $url
     * @param array $data
     * @return Clx_Http_Response
     */
    public function put( $auth, $url, $data = null );

    /**
     * @param $auth
     * @param string $url
     * @param array $data
     * @return Clx_Http_Response
     */
    public function delete( $auth, $url, $data = null );


}

?>