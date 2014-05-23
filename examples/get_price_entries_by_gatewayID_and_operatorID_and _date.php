<?php

require_once '../clxapi/Clx_Api.php';

$config = array(
    'username' => 'your-username',
    'password'=> 'your-password'
);


$clx = new Clx_Api( $config );
$clx->setBaseURI( 'https://example.com/api' );

try {
    $priceEntry = $clx->getPriceEntriesByGatewayIdAndOperatorIdAndDate( 2182, 10, '2014-05-23' );

    echo ' price: ' . $priceEntry->price;
    echo ' gateway: ' . $priceEntry->gateway;
    echo ' operator: ' . $priceEntry->operator;
    echo ' expireDate: ' . $priceEntry->expireDate;

} catch (Clx_Exception $e) {
    echo $e->getMessage();
    var_dump( $e->getResponseObject() );
}
?>