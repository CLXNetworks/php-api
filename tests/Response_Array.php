<?php


class Response_array {

public static  $responseArray = array(

                        /******************************
                         * Operator Requests
                         ******************************/

                        /*Successful request GET Operator by id 1*/
                        'https://clx-aws.clxnetworks.com/api/operator/1' => array( 'body' => '{    "id": 1,
                                                                                                    "name": "John Doe Mobile",
                                                                                                    "network": "DoeNetworks",
                                                                                                    "uniqueName": "DoeNet",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                }',
                                                                                    'headers' =>    "HTTP/1.1 200 OK\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 200,
                                                                                    'error' => ''),



                        /*Operator that not exists with error message GET*/
                        'https://clx-aws.clxnetworks.com/api/operator/9999' => array( 'body' => '{    "error": {
                                                                                                                "message": "Could not find operator with id: 9999",
                                                                                                                "code": 3001
                                                                                                                }
                                                                                                 }',
                                                                                    'headers' =>    "HTTP/1.1 404 Not Found\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 404,
                                                                                    'error' => ''),



                        /*Operator with unknown error GET*/
                        'https://clx-aws.clxnetworks.com/api/operator/9998' => array( 'body' => '{

                                                                                                 }',
                                                                                    'headers' =>    "HTTP/1.1 404 Not Found\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 404,
                                                                                    'error' => ''),



                        /*Successful request GET all operators*/
                        'https://clx-aws.clxnetworks.com/api/operator' => array( 'body' => '[
                                                                                                {   "id": 1,
                                                                                                    "name": "John Doe Mobile",
                                                                                                    "network": "DoeNetworks",
                                                                                                    "uniqueName": "DoeNet",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                },
                                                                                                {   "id": 2,
                                                                                                    "name": "Stahre Mobile",
                                                                                                    "network": "StahreNetworks",
                                                                                                    "uniqueName": "StahreNet",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                },
                                                                                                {   "id": 3,
                                                                                                    "name": "Mobix",
                                                                                                    "network": "MobixNetworks",
                                                                                                    "uniqueName": "MobixNet",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                }
                                                                                            ]',
                                                                                    'headers' =>    "HTTP/1.1 200 OK\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 200,
                                                                                    'error' => ''),


                        /******************************
                         * GATEWAY Requests
                         ******************************/

                        /*Successful request GET all gateways*/
                        'https://clx-aws.clxnetworks.com/api/gateway' => array( 'body' => '[
                                                                                                {   "id": 1,
                                                                                                    "name": "Supp1",
                                                                                                    "type": "Supplier"
                                                                                                },
                                                                                                {   "id": 2,
                                                                                                    "name": "Gateway 0",
                                                                                                    "type": "Product"
                                                                                                },
                                                                                                {   "id": 3,
                                                                                                    "name": "Cust1 gw0",
                                                                                                    "type": "Client"
                                                                                                }
                                                                                            ]',
                                                                                    'headers' =>    "HTTP/1.1 200 OK\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 200,
                                                                                    'error' => ''),


                        /*Successful request GET Gateway by id 1*/
                        'https://clx-aws.clxnetworks.com/api/gateway/1' => array( 'body' => '{      "id": 1,
                                                                                                    "name": "Supp1",
                                                                                                    "type": "Supplier"
                                                                                             }',
                                                                                    'headers' =>    "HTTP/1.1 200 OK\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 200,
                                                                                    'error' => '')




                );


}






?>