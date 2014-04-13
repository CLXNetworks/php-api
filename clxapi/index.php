<?php

require_once 'ClxApi.php';

$clx = new ClxApi('username', 'password');


/*
 Get an operator by id
 */
$operator = $clx->getOperatorsById(10);
var_dump($operator);


/*
 Get all operators
 */
//$operators = $clx->getOperators();
//var_dump($operators);