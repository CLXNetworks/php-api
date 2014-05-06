<?php

require_once __DIR__ . '/../clxapi/Clx_Http_Adapter_Interface.php';

class Clx_Http_AdapterTest implements Clx_Http_Adapter_Interface
{

    private $_responseArray = array(
        'https://clx-aws.clxnetworks.com/api/operator/10' => array( 'body' => '{    "id": 10,
                                                                                    "name": "test name",
                                                                                    "network": "networkname",
                                                                                    "uniqueName": "uniquename",
                                                                                    "isoCountryCode": "1",
                                                                                    "operationalState": "active",
                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                    "numberOfSubscribers": 0
                                                                               }',
                                                                    'headers' => "GET /api/operator/10 HTTP/1.1
                                                                                  Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxx==
                                                                                  Host: clx-aws.clxnetworks.com
                                                                                  Accept: */*",
                                                                    'code' => 200,
                                                                    'error' => ''));



    public function get( $username, $password, $url )
    {
        if( array_key_exists( $url, $this->_responseArray ) )
        {
            $result = $this->_responseArray[ $url ];

            require_once __DIR__ . '/../clxapi/Clx_Http_Response.php';
            return Clx_Http_Response::generateResponse( $result );
        }

        throw new Clx_Exception( 'Invalid request!' );

    }

    public function post( $username, $password, $url, $data = null )
    {

    }

    public function put()
    {

    }

    public function delete()
    {

    }
}