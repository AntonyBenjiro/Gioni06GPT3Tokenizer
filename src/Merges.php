<?php

namespace crazzy501\Gpt3Tokenizer;

use RuntimeException;

class Merges
{
    public function __construct(
        private readonly string $path
    )
    {
    }

    public function bpeMerges(): array
    {
        $lines = [];
        $fp = @fopen($this->path, 'rb');
        if ($fp) {
            // drop the first line of the buffer
            fgets($fp, 300);
            while (($buffer = fgets($fp, 300)) !== false) {
                $line = array_filter(
                    preg_split("/(\s+)/", $buffer),
                    static fn($e) => trim($e) !== ''
                );
                $lines[] = $line;
            }
            if (!feof($fp)) {
                throw new RuntimeException('Error: unexpected fgets() fail');
            }
            fclose($fp);
        }
        return $lines;
    }
}
