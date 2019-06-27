<?php

namespace Tests;

use BlockChair\BlockChair;
use Symfony\Component\VarDumper\VarDumper;

class TestCase extends \PHPUnit\Framework\TestCase
{


    protected $blockChair;


    protected function setUp(): void
    {
        parent::setUp();
        $this->blockChair = new BlockChair();
    }


    public function tearDown(): void
    {
        $this->blockChair = null;
    }
}