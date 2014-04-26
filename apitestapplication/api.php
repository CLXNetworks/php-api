<?php

class api {

    public function simulateRequest($url) {

        $api = array(
            'https://clx-aws.clxnetworks.com/api/operator/10' => array( 'data' => '{ "id": 10,
                                                                                    "name": "test name",
                                                                                    "network": "networkname",
                                                                                    "uniqueName": "uniquename",
                                                                                    "isoCountryCode": "1",
                                                                                    "operationalState": "active",
                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                    "numberOfSubscribers": 0
                                                                                   }',
                                                                        'code' => 200,
                                                                        'error' => ''),

            'https://clx-aws.clxnetworks.com/api/operator' => array( 'data' => '{ "id": 1,
                                                                                    "name": "test name",
                                                                                    "network": "networkname",
                                                                                    "uniqueName": "uniquename",
                                                                                    "isoCountryCode": "1",
                                                                                    "operationalState": "active",
                                                                                    "operationalStatDate": "-0001-11-30 00:00:00",
                                                                                    "numberOfSubscribers": 0
                                                                                   }',
                                                                        'code' => 200,
                                                                        'error' => '')
                );


        return $api[$url];

    }


}


