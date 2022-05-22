<?php

namespace App\Validation;

use App\DTO\Request\InputRequest;
use App\Utils\Constants;
use App\Utils\Helper\StringHelper;
use App\Utils\Messages;
use App\Utils\Regex;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class InputValidator
{
    /**
     * @param InputRequest $inputRequest
     * @param ExecutionContextInterface $context
     */
    public static function validateInputCriteria(InputRequest $inputRequest, ExecutionContextInterface $context)
    {
        $input = $inputRequest->getInput();

        if (empty($input) || !StringHelper::matchesPattern(Regex::ONLY_SMALL_CAPITAL_LETTERS_REGEX, $input))
        {
            $context->buildViolation(Messages::INPUT_REQUIRED)
                ->atPath(Constants::INPUT)
                ->addViolation();
        }
    }
}