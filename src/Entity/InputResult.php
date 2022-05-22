<?php

namespace App\Entity;

class InputResult
{
    /**
     * @var string
     */
    private $input;

    /**
     * @var array
     */
    private $result;

    public function __construct(string $input, array $result)
    {
        $this->input = $input;
        $this->result = $result;
    }

    /**
     * @return string
     */
    public function getInput(): string
    {
        return $this->input;
    }

    /**
     * @param string $input
     */
    public function setInput(string $input): void
    {
        $this->input = $input;
    }

    /**
     * @return array
     */
    public function getResult(): array
    {
        return $this->result;
    }

    /**
     * @param array $result
     */
    public function setResult(array $result): void
    {
        $this->result = $result;
    }

}