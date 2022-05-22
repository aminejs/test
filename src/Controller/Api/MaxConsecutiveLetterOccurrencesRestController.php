<?php

namespace App\Controller\Api;

use App\DTO\Request\InputRequest;
use App\Service\Interfaces\InputInterface;
use App\Utils\Helper\Controller\ControllerExceptionHandling;
use App\Validation\GatheringValidator;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations as Rest;


/**
 * Class MaxConsecutiveLetterOccurrencesRestController
 * @package App\Controller\Api
 *
 * @Rest\Route(name="max_letter_occurrences")
 */
class MaxConsecutiveLetterOccurrencesRestController extends AbstractFOSRestController
{
    use ControllerExceptionHandling;

    /** @var GatheringValidator */
    private GatheringValidator $validator;

    /** @var InputInterface */
    private InputInterface $inputService;

    public function __construct(GatheringValidator $validator, InputInterface $inputService)
    {
        $this->validator = $validator;
        $this->inputService = $inputService;
    }

    /**
     * @Rest\View(statusCode=200)
     * @Rest\Get(path="/maxLetterOccurrences", name="_singular")
     * @param InputRequest $inputRequest
     * @return View
     */
    public function getInputsMaxLetterOccurrences(InputRequest $inputRequest) : View
    {

        return $this->handleExceptions(function () use ($inputRequest){
            $this->validator->validate($inputRequest);
            $this->validator->throwIfInvalid();

            $this->inputService->getMaxLetterOccurrences($inputRequest);
            return $this->view($this->inputService->getMaxLetterOccurrences($inputRequest));
        });

    }
}