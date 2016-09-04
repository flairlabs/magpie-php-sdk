<?php

use Magpie\Card;
use Magpie\Token;
use Magpie\Charge;
use Magpie\Customer;

class Magpie
{
    private $isSandbox = false;
    private $currentUrl = '';
    private $pkKey = '';
    private $skKey = '';
    private $curl;
    private $token;
    private $charge;
    private $customer;

    public function __construct($pkKey = null, $skKey = null, $isSandbox = false)
    {
        $this->pkKey = $pkKey;
        $this->skKey = $skKey;
        $this->isSandbox = $isSandbox;
        $this->token = new Token($this->isSandbox, $this->pkKey);
        $this->charge = new Charge($this->isSandbox, $this->skKey);
        $this->customer = new Customer($this->isSandbox, $this->skKey);
    }

    public function __get($name) {
        if ($name === 'token') {
            return $this->token;
        }
        switch($name) {
            case 'token':
                return $this->token;
                break;
            case 'charge':
                return $this->charge;
                break;
            case 'customer':
                return $this->customer;
                break;
        }
    }
}
