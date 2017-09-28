<?php
namespace Crypto\Interfaces;

interface IOneWayEncrypt extends ICompare{
    public function Encrypt($toEncrypt, $salt);
}