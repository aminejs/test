<?php

namespace App\Utils\Helper\Controller;

use App\Utils\Constants;
use Exception;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ControllerExceptionHandling
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     * @required
     */
    public function setLogger(LoggerInterface $logger): void
    {
        $this->logger = $logger;
    }


    public function handleExceptions($function)
    {
        try {
            return $function();
        } catch (HttpException $e) {
            $withBody = in_array($e->getStatusCode(), [Response::HTTP_BAD_REQUEST]);
            return $this->reportError($e, $e->getStatusCode(), $withBody);
        } catch (Exception $e) {
            return $this->reportError($e, 500, false);
        }
    }

    private function reportError(Exception $e, $statusCode, $withResponseBody)
    {

        $this->logger->error($e->getMessage(), [Constants::STATUS_CODE => $statusCode]);

        $body = [Constants::MESSAGE => $e->getMessage()];
        return $this->view($withResponseBody ? $body : null, $statusCode);
    }

}