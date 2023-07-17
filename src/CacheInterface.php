<?php

namespace crazzy501\Gpt3Tokenizer;

interface CacheInterface
{

    public function get(string $key): mixed;

    public function set(string $key, mixed $value, int $ttl = 0): void;

    public function exists(string $key): bool;
}