<?php

namespace App\Service\Interfaces;

use App\DTO\Request\InputRequest;

interface InputInterface
{
    public function getMaxLetterOccurrences(InputRequest $inputRequest): array;
}