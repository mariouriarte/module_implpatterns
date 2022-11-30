<?php

namespace App\Service\Employ;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Repository\EmployRepository;

class FindOneEmployeeByNickname
{
    public function __construct(
        private readonly EmployRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(string $nickname): EmployeeDto
    {
        $employee = $this->repository->findOneByNickname($nickname);

        return $this->transformerDto->transformFromObject($employee);
    }
}
