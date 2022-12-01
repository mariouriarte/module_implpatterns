<?php

namespace App\Dto;

class EmployeeDto
{
    public function __construct(
        public readonly string $nombres,
        public readonly string $apellido_1,
        public readonly ?string $apellido_2,
        public readonly ?string $apellido_3,
        public readonly ?string $nickname,
        public readonly ?string $id
    ) {
    }
}
