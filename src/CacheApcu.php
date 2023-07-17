<?php

namespace crazzy501\Gpt3Tokenizer;

use function apc_exists;
use function apcu_fetch;
use function apcu_store;

class CacheApcu implements CacheInterface
{

    public function get(string $key): mixed
    {
        return apcu_fetch($key);
    }

    public function set(string $key, mixed $value, int $ttl = 0): void
    {
        apcu_store($key, $value, $ttl);
    }

    public function exists(string $key): bool
    {
        return apc_exists($key);
    }
}