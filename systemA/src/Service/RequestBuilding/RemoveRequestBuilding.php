<?php

namespace App\Service\RequestBuilding;

use App\Repository\RequestBuildingRepository;

class RemoveRequestBuilding
{
    public function __construct(
        private readonly RequestBuildingRepository $repository,
    ) {
    }

    public function remove(string $id): void
    {
        $requests = $this->repository->findOneById($id);

        $this->repository->remove($requests);
    }
}
