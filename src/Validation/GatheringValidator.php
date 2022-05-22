<?php


namespace App\Validation;

use App\Validation\Interfaces\EntityValidator;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class GatheringValidator implements EntityValidator
{
    /** @var ValidatorInterface */
    private $validator;

    private $errors;

    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
        $this->errors = [];
    }

    public function validate($entity)
    {
        /** @var ConstraintViolationList $validationErrors */
        $validationErrors = $this->validator->validate($entity);
        foreach($validationErrors->getIterator() as $error) {
            $this->errors[] = $error->getMessage();
        }
    }

    public function throwIfInvalid()
    {
        if (! $this->isValid()) {
            $errorsToThrow = $this->errors;
            $this->errors= [];
            throw new BadRequestHttpException(implode(", ", $errorsToThrow));

        }
    }


    public function isValid()
    {
        return (empty($this->errors));
    }
}