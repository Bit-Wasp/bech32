<?php

namespace BitWasp\Test\Unit\Bech32;

use BitWasp\Bech32\Exception\Bech32Exception;
use BitWasp\Test\Bech32\TestCase;

class DecodeTest extends TestCase
{
    public function failedDecodeFixtures()
    {
        return [
            ["\x201xj0phk", "Out of range character in bech32 string"],
            ["\x7F1g6xzxy", "Out of range character in bech32 string"],
            ["\x801vctc34", "Out of range character in bech32 string"],
            ["an84characterslonghumanreadablepartthatcontainsthetheexcludedcharactersbioandnumber11d6pts4", "Bech32 string cannot exceed 90 characters in length"],
            ["qyrz8wqd2c9m", "Missing separator character"],
            ["1qyrz8wqd2c9m", "Empty HRP"],
            ["y1b0jsk6g", "Invalid bech32 checksum"],
            ["lt1igcx5c0", "Invalid character"],
            ["in1muywd", "Too short checksum"],
            ["mm1crxm3i", "Invalid bech32 checksum"],
            ["au1s5cgom", "Invalid character"],
            ["M1VUXWEZ", "Invalid bech32 checksum"],
            ["16plkw9", "Bech32 string is too short"],
            ["1p2gdwpf", "Empty HRP"],
            ["bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t5", "Invalid bech32 checksum"],
        ];
    }

    /**
     * @param string $bech32
     * @param string $exceptionMsg
     * @dataProvider failedDecodeFixtures
     */
    public function testDecodeFails($bech32, $exceptionMsg)
    {
        $this->expectException(Bech32Exception::class);
        $this->expectExceptionMessage($exceptionMsg);
        \BitWasp\Bech32\decode($bech32);
    }

    /**
     * @return array
     */
    public function validChecksumProvider()
    {
        return [
            ["A1LQFN3A"],
            ["a1lqfn3a"],
            ["an83characterlonghumanreadablepartthatcontainsthetheexcludedcharactersbioandnumber11sg7hg6"],
            ["abcdef1l7aum6echk45nj3s0wdvt2fg8x9yrzpqzd3ryx"],
            ["11llllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllllludsr8"],
            ["split1checkupstagehandshakeupstreamerranterredcaperredlc445v"],
            ["?1v759aa"],
        ];
    }

    /**
     * https://github.com/sipa/bech32/blob/master/ref/python/tests.py#L90
     * @param string $hasValidChecksum
     * @dataProvider validChecksumProvider
     */
    public function testValidChecksum($hasValidChecksum)
    {
        \BitWasp\Bech32\decode($hasValidChecksum);

        $pos = strrpos($hasValidChecksum, "1");
        $invalidChecksum = substr($hasValidChecksum, 0, $pos+1) . chr(ord($hasValidChecksum[$pos+1])^1) . substr($hasValidChecksum, $pos+2);

        $this->expectException(Bech32Exception::class);
        \BitWasp\Bech32\decode($invalidChecksum);
    }

    /**
     * @return array
     */
    public function invalidChecksumProvider()
    {
        return [
            [" 1nwldj5"],
            ["\x7f"."1axkwrx"],
            ["an84characterslonghumanreadablepartthatcontainsthenumber1andtheexcludedcharactersbio1569pvx"],
            ["pzry9x0s0muk"],
            ["1pzry9x0s0muk"],
            ["x1b4n0q5v"],
            ["li1dgmt3"],
            ["de1lg7wt"."\xff"],
            ["bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t5"]
        ];
    }

    /**
     * https://github.com/sipa/bech32/blob/master/ref/python/tests.py#L100
     * @param string $hasValidChecksum
     * @dataProvider invalidChecksumProvider
     */
    public function testInvalidChecksum($hasValidChecksum)
    {
        $this->expectException(Bech32Exception::class);
        \BitWasp\Bech32\decode($hasValidChecksum);
    }
}
