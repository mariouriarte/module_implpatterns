<?php

namespace App\Service\Employ\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployNotFoundException extends NotFoundHttpException
{
    private const MESSAGE = 'Employ with nickname %s not found';
    private const MESSAGE_ID = 'Employ with ID %s not found';

    public static function fromNickname(string $nickname): self
    {
        throw new self(\sprintf(self::MESSAGE, $nickname));
    }

    public static function fromId(string $id): self
    {
        throw new self(\sprintf(self::MESSAGE_ID, $id));
    }
}
