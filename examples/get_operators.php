<?php

require_once 'clxapi/Clx_Api.php';

$config = array(
    'username' => 'your-username',
    'password'=> 'your-password'
);


$clx = new Clx_Api( $config );
$clx->setBaseURI( 'https://example.com/api' );

try
{
    $operators = $clx->getOperators();

    foreach ( $operators as $operator )
    {
        echo 'id: ' . $operator->id;
        echo ' name: ' . $operator->name;
        echo ' network: ' . $operator->network;
        echo ' uniqueName: ' . $operator->uniqueName;
        echo ' isoCountryCode: ' . $operator->isoCountryCode;
        echo ' operationalState: ' . $operator->operationalState;
        echo ' operationalStatDate: ' . $operator->operationalStatDate;
        echo ' numberOfSubscribers: ' . $operator->numberOfSubscribers . "\n";

    }
}
catch ( Exception $e ) {
    echo $e->getMessage();
    var_dump( $e->getResponseObject() );
}



?>