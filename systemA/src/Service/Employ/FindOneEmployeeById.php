<?php

namespace App\Service\Employ;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployRepository;

class FindOneEmployeeById
{
    public function __construct(
        private readonly EmployRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(string $id): EmployeeDto
    {
        $employee = $this->repository->findOneById($id);

        return $this->transformerDto->transformFromObject($employee);
    }
}
