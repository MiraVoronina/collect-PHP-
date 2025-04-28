<?php

namespace Collect;

class Collect
{
    private array $array = [];

    public function __construct(array $array = [])
    {
        $this->array = $array;
    }

    public function get($key = null)
    {
        return $key ? $this->array[$key] ?? null : $this->array;
    }

    public function first()
    {
        return reset($this->array);
    }

    public function count(): int
    {
        return count($this->array);
    }

    public function toArray(): array
    {
        return $this->array;
    }

    public function map(callable $callback): Collect
    {
        return new self(array_map($callback, $this->array));
    }

    public function each(callable $callback, ...$args): Collect
    {
        foreach ($this->array as $key => $item) {
            $callback($item, $key, ...$args);
        }
        return $this;
    }

    public function push($value, $key = null): Collect
    {
        $this->array[$key ?? count($this->array)] = is_array($value) ? new self($value) : $value;
        return $this;
    }

    public function unshift($value): Collect
    {
        array_unshift($this->array, $value);
        return $this;
    }

    public function shift(): Collect
    {
        array_shift($this->array);
        return $this;
    }

    public function pop(): Collect
    {
        array_pop($this->array);
        return $this;
    }

    public function splice($offset, $length = 1): Collect
    {
        array_splice($this->array, $offset, $length);
        return $this;
    }
}
