<?php

namespace App\Service\Employee;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Entity\Employee;
use App\Repository\EmployeeRepository;
use App\Service\Employee\ValueObject\CreateEmployeeInput;

class CreateEmployee
{
    public function __construct(
        private readonly EmployeeRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(CreateEmployeeInput $input): EmployeeDto
    {
        $employee = new Employee();
        $employee->setNombres($input->nombres);
        $employee->setApellido1($input->apellido_1);
        $employee->setApellido2($input->apellido_2);
        $employee->setApellido3($input->apellido_3);
        $employee->setNickname($input->nickname);

        $this->repository->save($employee);

        return $this->transformerDto->transformFromObject($employee);
    }
}
