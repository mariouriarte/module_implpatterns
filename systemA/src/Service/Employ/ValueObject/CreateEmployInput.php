<?php

namespace App\Service\Employ\ValueObject;

class CreateEmployInput
{
    public function __construct(
        public readonly string $nombres,
        public readonly string $apellido_1,
        public readonly ?string $nickname,
        public readonly ?string $apellido_2 = null,
        public readonly ?string $apellido_3 = null
    ) {
    }
}
