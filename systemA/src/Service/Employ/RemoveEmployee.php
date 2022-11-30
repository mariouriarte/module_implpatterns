<?php

namespace App\Service\Employ;

use App\Repository\EmployRepository;

class RemoveEmployee
{
    public function __construct(
        private readonly EmployRepository $repository,
    ) {
    }

    public function remove(string $id): void
    {
        $employee = $this->repository->findOneById($id);

        $this->repository->remove($employee);
    }
}
