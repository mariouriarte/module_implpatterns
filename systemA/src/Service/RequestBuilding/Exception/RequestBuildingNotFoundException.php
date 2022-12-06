<?php

namespace App\Service\RequestBuilding\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RequestBuildingNotFoundException extends NotFoundHttpException
{
    private const MESSAGE_ID = 'Request Building with ID %s not found';

    public static function fromId(string $id): self
    {
        throw new self(\sprintf(self::MESSAGE_ID, $id));
    }
}
