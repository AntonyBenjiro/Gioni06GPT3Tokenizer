<?php

namespace crazzy501\Gpt3Tokenizer;

class CacheArray implements CacheInterface
{
    private array $storage = [];
    private array $ttls = [];

    public function get(string $key): mixed
    {
        if (isset($this->ttls[$key]) && time() >= $this->ttls[$key]) {
            unset($this->storage[$key], $this->ttls[$key]);
        }
        return $this->storage[$key] ?? null;
    }

    public function set(string $key, mixed $value, int $ttl = 0): void
    {
        $this->storage[$key] = $value;
        if ($ttl > 0) {
            $this->ttls[$key] = time() + $ttl;
        }
    }

    public function exists(string $key): bool
    {
        return $this->get($key) !== null;
    }
}