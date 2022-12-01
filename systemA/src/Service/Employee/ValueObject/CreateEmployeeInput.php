<?php

namespace App\Service\Employee\ValueObject;

class CreateEmployeeInput
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
