#php-api

PHP wrapper for the CLX REST API

##Examples

### Get an Operator by ID


```
$config = array(
    'username' => 'your-username',
    'password'=> 'your-password'
);

$clx = new Clx_Api( $config );
$clx->setBaseURI( 'https://your-base-url' );

$operator = $clx->getOperatorById( 10 );

```
getOperatorbyId will return a Clx_Http_Response object

```
example Clx_Http_Object goes here....

```
##Requirements

