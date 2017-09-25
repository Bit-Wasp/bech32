<?php

namespace BitWasp\Test\Bech32;


abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    public function readDataFile($fileName)
    {
        $file = file_get_contents(__DIR__ . "/data/$fileName.json");
        if (!$file) {
            throw new \RuntimeException("Missing test fixtures file: $file");
        }

        $decoded = json_decode($file, true);
        if (!$decoded) {
            throw new \RuntimeException("Missing JSON in fixtures file: $fileName");
        }
        var_dump($fileName);
        var_dump($file);
        var_dump($decoded);
        return $decoded;
    }
}
