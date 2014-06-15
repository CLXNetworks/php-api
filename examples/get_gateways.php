<?php

require_once '../clxapi/Clx_Api.php';

$config = array(
    'username' => 'your-username',
    'password'=> 'your-password'
);


$clx = new Clx_Api( $config );
$clx->setBaseURI( 'https://example.com/api' );

try
{
    $gateways = $clx->getGateways();

    foreach ( $gateways as $gateway )
    {
        echo 'id: ' . $gateway->id;
        echo ' name: ' . $gateway->name;
        echo ' type: ' . $gateway->type;
    }

} catch (Clx_Exception $e) {
    echo 'Message: ' . $e->getMessage() . "\n";
    echo 'Code: ' . $e->getCode(). "\n";
    var_dump( $e->getResponseObject() );
}



?>