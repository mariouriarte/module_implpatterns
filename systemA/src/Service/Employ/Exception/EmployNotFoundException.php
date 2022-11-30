<?php

namespace App\Service\Employ\Exception;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EmployNotFoundException extends NotFoundHttpException
{
    private const MESSAGE = 'Employ with nickname %s not found';

    public static function fromNickname(string $nickname): self
    {
        throw new self(\sprintf(self::MESSAGE, $nickname));
    }
}
