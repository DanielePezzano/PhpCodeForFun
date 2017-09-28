<?php
namespace EncriptionLib\Interfaces;

interface IOneWayEncrypt extends ICompare{
    public function Encrypt($toEncrypt, $salt);
}