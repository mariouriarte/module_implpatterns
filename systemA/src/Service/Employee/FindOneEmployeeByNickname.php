<?php

namespace App\Service\Employee;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployeeRepository;

class FindOneEmployeeByNickname
{
    public function __construct(
        private readonly EmployeeRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(string $nickname): EmployeeDto
    {
        $employee = $this->repository->findOneByNickname($nickname);

        return $this->transformerDto->transformFromObject($employee);
    }
}
