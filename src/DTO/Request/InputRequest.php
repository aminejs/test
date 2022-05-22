<?php

namespace App\DTO\Request;


use App\Http\RequestDTOInterface;
use App\Utils\Constants;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Assert\Callback({"App\Validation\InputValidator", "validateInputCriteria"})
 */
class InputRequest implements RequestDTOInterface
{

    /**
     * @var string
     */
    private $input;

    public function __construct(Request $request)
    {
        $this->input = $request->query->get( Constants::INPUT);
    }

    /**
     * @return string
     */
    public function getInput()
    {
        return $this->input;
    }


}
