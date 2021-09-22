<?php

namespace BitWasp\Test\Bech32\Provider;

class InvalidAddresses
{
    /**
     * @var array
     */
    private static $fixtures = [

        [
            "tb",
            "tc1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vq5zuyut",
            "Invalid prefix for address"
        ],
        [
            "bc",
            "bc1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vqh2y7hd",
            "Invalid bech32 checksum"
        ],
        [
            "tb",
            "tb1z0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vqglt7rf",
            "Invalid bech32 checksum"
        ],
        [
            "bc",
            "BC1S0XLXVLHEMJA6C4DQV22UAPCTQUPFHLXM9H8Z3K2E72Q4K9HCZ7VQ54WELL",
            "Invalid bech32 checksum"
        ],
        [
            "bc",
            "bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kemeawh",
            "Invalid bech32 checksum"
        ],
        [
            "tb",
            "tb1q0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vq24jc47",
            "Invalid bech32 checksum"
        ],
        [
            "bc",
            "bc1p38j9r5y49hruaue7wxjce0updqjuyyx0kh56v8s25huc6995vvpql3jow4",
            "Invalid character"
        ],
        [
            "bc",
            "BC130XLXVLHEMJA6C4DQV22UAPCTQUPFHLXM9H8Z3K2E72Q4K9HCZ7VQ7ZWS8R",
            "Invalid witness version"
        ],
        [
            "bc",
            "bc1pw5dgrnzv",
            "Witness program size was out of valid range"
        ],
        [
            "bc",
            "bc1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7v8n0nx0muaewav253zgeav",
            "Invalid length for segwit address"
        ],
        [
            "bc",
            "BC1QR508D6QEJXTDG4Y5R3ZARVARYV98GJ9P",
            "Invalid size for V0 witness program"
        ],
        [
            "tb",
            "tb1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vq47Zagq",
            "Data contains mixture of higher/lower case characters"
        ],
        [
            "bc",
            "bc1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7v07qwwzcrf",
            "Invalid data"
        ],
        [
            "tb",
            "tb1p0xlxvlhemja6c4dqv22uapctqupfhlxm9h8z3k2e72q4k9hcz7vpggkg4j",
            "Invalid data"
        ],
        [
            "bc",
            "bc1gmk9yu",
            "Invalid length for segwit address"
        ],

        /*
        [
            "tb",
            "tc1qw508d6qejxtdg4y5r3zarvary0c5xw7kg3g4ty",
            "Invalid prefix for address"
        ],
        [
            "bc",
            "bc1qw508d6qejxtdg4y5r3zarvary0c5xw7kv8f3t5",
            "Invalid bech32 checksum"
        ],
        [
            "bc",
            "BC13W508D6QEJXTDG4Y5R3ZARVARY0C5XW7KN40WF2",
            "Invalid witness version"
        ],
        [
            "bc",
            "bc1rw5uspcuh",
            "Witness program size was out of valid range"
        ],
        [
            "bc",
            "bc10w508d6qejxtdg4y5r3zarvary0c5xw7kw508d6qejxtdg4y5r3zarvary0c5xw7kw5rljs90",
            "Invalid length for segwit address"
        ],
        [
            "bc",
            "BC1QR508D6QEJXTDG4Y5R3ZARVARYV98GJ9P",
            "Invalid size for V0 witness program"
        ],
        [
            "tb",
            "tb1qrp33g0q5c5txsp9arysrx4k6zdkfs4nce4xj0gdcccefvpysxf3q0sL5k7",
            "Data contains mixture of higher/lower case characters"
        ],
        [
            "bc",
            "bc1zw508d6qejxtdg4y5r3zarvaryvqyzf3du",
            "Invalid data"
        ],
        [
            "bc",
            "bc1gmk9yu",
            "Invalid length for segwit address"
        ],
        */
    ];

    /**
     * @return array
     */
    public static function load()
    {
        return self::$fixtures;
    }
}
