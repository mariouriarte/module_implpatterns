<?php

namespace App\Service\Employee;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployeeRepository;

class FindOneEmployeeById
{
    public function __construct(
        private readonly EmployeeRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(string $id): EmployeeDto
    {
        $employee = $this->repository->findOneById($id);

        return $this->transformerDto->transformFromObject($employee);
    }
}
