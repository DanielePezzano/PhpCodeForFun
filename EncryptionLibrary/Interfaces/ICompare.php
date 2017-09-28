<?php
namespace EncriptionLib\Interfaces;

interface ICompare {
    public function Compare($encrypted, $toEncrypt);
}
