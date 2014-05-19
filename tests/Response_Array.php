<?php


class Response_array {

public static  $responseArray = array(
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


                        'https://clx-aws.clxnetworks.com/api/operator/9999' => array( 'body' => '{    "error": {
                                                                                                                "message": "Could not find operator with id: 1111111",
                                                                                                                "code": 3001
                                                                                                                }
                                                                                                 }',
                                                                                    'headers' =>    "HTTP/1.1 404 Not Found\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 404,
                                                                                    'error' => ''),

                        'https://clx-aws.clxnetworks.com/api/operator/9998' => array( 'body' => '{

                                                                                                 }',
                                                                                    'headers' =>    "HTTP/1.1 404 Not Found\r
                                                                                                    Server: Apache\r
                                                                                                    Content-Type: application/json\r",
                                                                                    'statusCode' => 404,
                                                                                    'error' => ''),



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
                                                                                    'error' => '')




                );


}






?>