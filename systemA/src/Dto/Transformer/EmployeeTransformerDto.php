<?php

namespace App\Dto\Transformer;

use App\Dto\EmployeeDto;
use App\Entity\Employee;

class EmployeeTransformerDto extends AbstractResponseDtoTransformer
{
    /**
     * @param Employee $object
     *
     * @return EmployeeDto
     */
    public function transformFromObject($object): EmployeeDto
    {
        return new EmployeeDto(
            nombres: $object->getNombres(),
            apellido_1: $object->getApellido1(),
            apellido_2: $object->getApellido2(),
            apellido_3: $object->getApellido3(),
            nickname: $object->getNickname(),
            id: $object->getId()
        );
    }
}
