<?php

namespace Tests\Endpoint;

use Tests\TestCase;

class BitcoinTest extends TestCase
{

    /**
     * @test
     */
    function it_should_be_able_to_call_the_stats_endpoint()
    {
        $response = $this->blockChair->bitcoin->stats();
        $this->assertTrue(array_key_exists('data', $response));
        $this->assertTrue(array_key_exists('context', $response));
    }

    /**
     * @test
     */
    function it_should_be_able_to_call_the_block_endpoint()
    {
        $blockId = 582700;
        $response = $this->blockChair->bitcoin->getBlock($blockId);

        $this->assertTrue(array_key_exists('data', $response));
        $this->assertTrue(array_key_exists('context', $response));

        $this->assertEquals($response['data']->$blockId->block->id, $blockId);
    }


    /**
     * @test
     */
    function it_should_be_able_to_call_the_transaction_endpoint()
    {
        $txId = '54a7cfc88f08f1112d747183d8fe2c3e135846759e4b94071f9365893e682601';
        $response = $this->blockChair->bitcoin->getTransaction($txId);

        $this->assertTrue(array_key_exists('data', $response));
        $this->assertTrue(array_key_exists('context', $response));
        $this->assertEquals($response['data']->$txId->transaction->hash, $txId);
    }


    /**
     * @test
     */
    function it_should_be_able_to_call_the_address_endpoint()
    {
        $address= '3EA2QUNM8GjZroMFGXNwxi8zvw4RBYNuSd';
        $response = $this->blockChair->bitcoin->getAddress($address);

        $this->assertTrue(array_key_exists('data', $response));
        $this->assertTrue(array_key_exists('context', $response));
        $this->assertEquals($response['data']->$address->address->script_hex, 'a91488bd247037ebcb41ea4efba2ceed2554f00d1fea87');
    }
}