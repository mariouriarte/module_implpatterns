<?php

namespace App\Api\Listener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JsonExceptionResponseTransformerListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if ($exception instanceof HttpException) {
            $data = [
                'class' => \get_class($exception),
                'statusCode' => $exception->getStatusCode(),
                'message' => $exception->getMessage(),
            ];
            $event->setResponse($this->prepareResponse($data, $data['statusCode']));
        }
    }

    private function prepareResponse(array $data, int $statusCode): JsonResponse
    {
        $response = new JsonResponse($data, $statusCode);
        $response->headers->set('Server-Time', \time());
        $response->headers->set('X-error-Code', $statusCode);

        return $response;
    }
}
