<?php


class Response_array {

public static  $responseArray = array(
                        'https://clx-aws.clxnetworks.com/api/operator/10' => array( 'body' => '{    "id": 10,
                                                                                                    "name": "test name",
                                                                                                    "network": "networkname",
                                                                                                    "uniqueName": "uniquename",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                }',
                                                                                    'headers' =>    "GET /api/operator/10 HTTP/1.1
                                                                                                    Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxx==
                                                                                                    Host: clx-aws.clxnetworks.com
                                                                                                    Accept: */*",
                                                                                    'code' => 200,
                                                                                    'error' => ''),

                        'https://clx-aws.clxnetworks.com/api/operator' => array( 'body' => '{       "id": 10,
                                                                                                    "name": "test name",
                                                                                                    "network": "networkname",
                                                                                                    "uniqueName": "uniquename",
                                                                                                    "isoCountryCode": "1",
                                                                                                    "operationalState": "active",
                                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                                    "numberOfSubscribers": 0
                                                                                                }',
                                                                                    'headers' =>    "GET /api/operator/10 HTTP/1.1
                                                                                                    Authorization: Basic xxxxxxxxxxxxxxxxxxxxxxxx==
                                                                                                    Host: clx-aws.clxnetworks.com
                                                                                                    Accept: */*",
                                                                                    'code' => 200,
                                                                                    'error' => '')




                );


}






?>