<?php

namespace App\Service\Employee;

use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployeeRepository;

class FetchAllEmployees
{
    public function __construct(
        private readonly EmployeeRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(): array
    {
        $employees = $this->repository->findAll();

        return $this->transformerDto->transformFromObjects($employees);
    }
}
