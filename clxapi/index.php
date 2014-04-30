<?php

require_once 'ClxApi.php';

$clx = new ClxApi('username', 'password');
$clx->setBaseURI('https://example.com/api');

/*
 Get an operator by id
 */
$operator = $clx->getOperatorsById(10);

//Dumps Clx_Http_Response object
var_dump($operator);

//Dumps a stdClass object
//var_dump(json_decode($operator->getData()));



/*
 Get all operators
 */
//$operators = $clx->getOperators();
//var_dump($operators);