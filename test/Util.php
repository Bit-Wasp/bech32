<?php

declare(strict_types=1);

namespace BitWasp\Test\Bech32;

class Util
{
    public static function witnessProgram($version, $program)
    {
        if ($version < 0 || $version > 16) {
            throw new \RuntimeException("Invalid version for witness program");
        }

        $version = pack("C", ($version > 0 ? (0x50 + $version) : 0));
        $length = pack("C", strlen($program));

        return unpack("H*", "{$version}{$length}{$program}")[1];
    }
}
