<?php

class Clx_Http_Response_Json {


    public function getJsonDecodedBody($data) {

        return json_decode($data);
    }

}

?>