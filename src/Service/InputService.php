<?php

namespace App\Service;

use App\DTO\Request\InputRequest;
use App\Service\Interfaces\InputInterface;
use App\Utils\Helper\Entity\InputResultHelper;

class InputService implements InputInterface
{
    use InputResultHelper;

    /**
     * @var int
     */
    const CHUNK_SIZE = 5;

    /**
     * @param InputRequest $inputRequest
     * @return array
     */
    public function getMaxLetterOccurrences(InputRequest $inputRequest): array
    {
        $input = $inputRequest->getInput();
        $length = strlen($input);
        $tempArray = [];
        $count = 0;
        $occurrences = [];

        for ($i = 0; $i < $length; $i++) {
            $countBefore = $i > 0 ? count($tempArray) : 1;
            $tempArray[$input[$i]] = $count++;
            $countAfter = count($tempArray);
            $endValue = end($occurrences);

            if ($countBefore != $countAfter) {
                if (is_bool($endValue)) {
                    $occurrences[$input[$i-1]] = $count-1;
                } elseif ($endValue < $count-1) {
                    $occurrences = [];
                    $occurrences[$input[$i-1]] = $count-1;
                }
                unset($tempArray[$input[$i-1]]);
                $count = 1;
            } elseif ($i == $length - 1) {
                if(is_bool($endValue)) {
                    $occurrences[$input[$i]] = $count;
                } elseif ($endValue < $count) {
                    $occurrences = [];
                    $occurrences[$input[$i]] = $count;
                }
            }
        }

        return $occurrences;
    }

    public function getAllMaxLetterOccurrences(): array
    {
        return array_chunk($this->buildInputResultArray(), self::CHUNK_SIZE);
    }
}