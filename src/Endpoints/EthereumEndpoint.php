<?php

namespace BlockChair\Endpoints;

class EthereumEndpoint extends BaseEndpoint
{

    public function __construct($chain)
    {
        parent::__construct($chain);
    }


    public function uncle($txId)
    {
        $endpoint = $this->dashboardEndpoint.'uncle/'.$txId;
    }
}