<?php

namespace crazzy501\Gpt3Tokenizer;

class Gpt3TokenizerConfig
{

    private string $mergesPath = __DIR__ . '/pretrained_vocab_files/merges.txt';
    private string $vocabPath = __DIR__ . '/pretrained_vocab_files/vocab.json';
    private CacheInterface|string $cache = CacheArray::class;

    public function setMergesPath($path): Gpt3TokenizerConfig
    {
        $this->mergesPath = $path;
        return $this;
    }

    public function setVocabPath($path): Gpt3TokenizerConfig
    {
        $this->vocabPath = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getCacheClass(): string
    {
        return $this->cache;
    }

    /**
     * @param class-string|CacheInterface $cache
     * @return Gpt3TokenizerConfig
     */
    public function setCacheClass(string $cache): Gpt3TokenizerConfig
    {
        $this->cache = $cache;
        return $this;
    }

    /**
     * @return string
     */
    public function getMergesPath(): string
    {
        return $this->mergesPath;
    }

    /**
     * @return string
     */
    public function getVocabPath(): string
    {
        return $this->vocabPath;
    }
}