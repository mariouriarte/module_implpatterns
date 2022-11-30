<?php

namespace App\Service\Employ;

use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployRepository;

class FetchAllEmployees
{
    public function __construct(
        private readonly EmployRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(): array
    {
        $employees = $this->repository->findAll();

        return $this->transformerDto->transformFromObjects($employees);
    }
}
