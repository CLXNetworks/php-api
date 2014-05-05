<?php

class Clx_Http_Response_Json extends Clx_Http_Response {


    public function getJsonDecodedBody()
    {
        $body = $this->getBody();

        return json_decode( $body );
    }

}

?>