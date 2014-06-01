###Examples



##Get Gateway by id

```

    <?php

        require_once '../clxapi/Clx_Api.php';

        $config = array(
            'username' => 'your-username',
            'password'=> 'your-password'
        );


        $clx = new Clx_Api( $config );
        $clx->setBaseURI( 'https://example.com/api' );

        try {
            $gateway = $clx->getGatewayById( 1 );

            echo ' id: ' . $gateway->id;
            echo ' name: ' . $gateway->name;
            echo ' type: ' . $gateway->type;


        } catch (Clx_Exception $e) {
            echo $e->getMessage();
            var_dump( $e->getResponseObject() );
        }
    ?>


```


##Get Gateways

```

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
        }
        catch ( Exception $e ) {
            echo $e->getMessage();
            var_dump( $e->getResponseObject() );
        }

    ?>


```

##Get Operator by id

```

    <?php

        require_once '../clxapi/Clx_Api.php';

        $config = array(
            'username' => 'your-username',
            'password'=> 'your-password'
        );


        $clx = new Clx_Api( $config );
        $clx->setBaseURI( 'https://example.com/api' );

        try {
            $operator = $clx->getOperatorById( 1 );

            echo ' id: ' . $operator->id;
            echo ' name: ' . $operator->name;
            echo ' network: ' . $operator->network;
            echo ' uniqueName: ' . $operator->uniqueName;
            echo ' isoCountryCode: ' . $operator->isoCountryCode;
            echo ' operationalState: ' . $operator->operationalState;
            echo ' operationalStatDate: ' . $operator->operationalStatDate;
            echo ' numberOfSubscribers: ' . $operator->numberOfSubscribers . "\n";

        } catch (Clx_Exception $e) {
            echo $e->getMessage();
            var_dump( $e->getResponseObject() );
        }
    ?>


```

##Get Operators

```

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


```

##Get Price entries by gatewayid

```

    <?php

        require_once '../clxapi/Clx_Api.php';

        $config = array(
            'username' => 'your-username',
            'password'=> 'your-password'
        );


        $clx = new Clx_Api( $config );
        $clx->setBaseURI( 'https://example.com/api' );

        try {
            $priceEntries = $clx->getPriceEntriesByGatewayId( 2182 );

            var_dump($priceEntries);
            die();

            foreach ( $priceEntries as $priceEntry)
            {
                echo ' price: ' . $priceEntry->price;
                echo ' gateway: ' . $priceEntry->gateway;
                echo ' operator: ' . $priceEntry->operator;
                echo ' expireDate: ' . $priceEntry->expireDate;
            }

        } catch (Clx_Exception $e) {
            echo $e->getMessage();
            var_dump( $e->getResponseObject() );
        }

    ?>


```


##Get Price entries by gatewayid and operatorid

```

    <?php

        require_once '../clxapi/Clx_Api.php';

        $config = array(
            'username' => 'your-username',
            'password'=> 'your-password'
        );


        $clx = new Clx_Api( $config );
        $clx->setBaseURI( 'https://example.com/api' );

        try {
            $priceEntry = $clx->getPriceEntriesByGatewayIdAndOperatorId( 2182, 10 );

            echo ' price: ' . $priceEntry->price;
            echo ' gateway: ' . $priceEntry->gateway;
            echo ' operator: ' . $priceEntry->operator;
            echo ' expireDate: ' . $priceEntry->expireDate;

        } catch (Clx_Exception $e) {
            echo $e->getMessage();
            var_dump( $e->getResponseObject() );
        }
    ?>


```

##Get Price entries by gatewayid and operatorid and date

```

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


```