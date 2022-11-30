<?php

namespace App\Service\Employee;

use App\Repository\EmployeeRepository;

class RemoveEmployee
{
    public function __construct(
        private readonly EmployeeRepository $repository,
    ) {
    }

    public function remove(string $id): void
    {
        $employee = $this->repository->findOneById($id);

        $this->repository->remove($employee);
    }
}
