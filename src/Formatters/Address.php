<?php

/**
 * This file is part of web3.php package.
 * 
 * (c) Kuan-Cheng,Lai <alk03073135@gmail.com>
 * 
 * @author Peter Lai <alk03073135@gmail.com>
 * @license MIT
 */

namespace Web3\Formatters;

use InvalidArgumentException;
use Web3\Utils;
use Web3\Formatters\IFormatter;

class Address implements IFormatter
{
    /**
     * format
     * to do: iban
     * 
     * @param mixed $value
     * @return string
     */
    public static function format($value)
    {
        if (Utils::isAddress($value)) {
            $value = mb_strtolower($value);

            if (Utils::isZeroPrefixed($value)) {
                return $value;
            }
            return '0x' . $value;
        }
        throw new InvalidArgumentException('The address to inputFormat is invalid.');
    }
}