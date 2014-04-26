<?php

class api {

    public function __construct($url) {
        return $this->simulateRequest($url);
    }

    public function simulateRequest($url) {



        $api = array(
            'https://clx-aws.clxnetworks.com/api/operator/10' => array('data' => '{"id": 10,
                                                                                    "name": "Orascom Algeria",
                                                                                    "network": "Djezzy",
                                                                                    "uniqueName": "Djezzy-DZ",
                                                                                    "isoCountryCode": "12",
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


