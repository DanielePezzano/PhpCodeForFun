<?php
namespace Crypto\Interfaces;

interface ICompare {
    public function Compare($encrypted, $toEncrypt, $salt);
}
