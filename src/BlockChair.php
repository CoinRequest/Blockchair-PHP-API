<?php

namespace BlockChair;

use BlockChair\Endpoints\BaseEndpoint;
use BlockChair\Endpoints\EthereumEndpoint;

class BlockChair
{

    /**
     * @var BaseEndpoint
     */
    public $bitcoin;

    /**
     * @var EthereumEndpoint
     */
    public $ethereum;

    /**
     * @var BaseEndpoint
     */
    public $bitcoinCash;

    /**
     * @var BaseEndpoint
     */
    public $bitcoinSv;

    /**
     * @var BaseEndpoint
     */
    public $litecoin;

    /**
     * @var BaseEndpoint
     */
    public $dogecoin;

    /**
     * @var BaseEndpoint
     */
    public $dash;

    /**
     * @var BaseEndpoint
     */
    public $groestlcoin;


    public function __construct()
    {
        $this->bitcoin = new BaseEndpoint('bitcoin');
        $this->ethereum = new EthereumEndpoint('ethereum');
        $this->bitcoinCash = new BaseEndpoint('bitcoin-cash');
        $this->bitcoinSv = new BaseEndpoint('bitcoin-sv');
        $this->litecoin = new BaseEndpoint('litecoin');
        $this->dogecoin = new BaseEndpoint('dogecoin');
        $this->dash = new BaseEndpoint('dash');
        $this->groestlcoin = new BaseEndpoint('groestlcoin');
    }
}