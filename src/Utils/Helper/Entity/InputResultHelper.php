<?php

namespace App\Utils\Helper\Entity;

use App\Entity\InputResult;

trait InputResultHelper
{
    public function buildInputResultArray(): array
    {
        return [
            new InputResult('aaaaPPPLLvvv', ['a' => 4]),
            new InputResult('cccOYgg', ['c' => 3]),
            new InputResult('FFFF', ['F' => 4]),
            new InputResult('bbbbbbbPPPPPPPPZZx', ['P' => 8]),
            new InputResult('AAAZZZZiiiiiiiiiiiiiiiidddddddddddaaawwwwwwwwwwwwwww', ['i' => 16]),
            new InputResult('uuuuuuuuuuTTTTTCCCCCFFFFZZZZZZZZZZZ', ['Z' => 11]),
            new InputResult('VVVVVvGGGXwwpppiSS', ['V' => 5]),
            new InputResult('XXXXXXxxxxxxxxx', ['x' => 8]),
            new InputResult('QQQQQQQQQYYYYYYYYYYYYEEEEEEEEEEeeeeeeeeeiiiiii', ['Y' => 12]),
            new InputResult('OOOOOOOOOOOO', ['O' => 12]),
            new InputResult('OOOOOOOOOOOORRRrrrrrrrrrrrrrrKKKkkkkx', ['r' => 14]),
            new InputResult('sssssssskkkkkkkkkkkkkkkkkkkkkrrrrrrrrrrrrsdsdsssssss', ['k' => 21])
        ];
    }
}
