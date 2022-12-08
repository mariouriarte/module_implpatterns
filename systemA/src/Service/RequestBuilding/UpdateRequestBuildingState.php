<?php

namespace App\Service\RequestBuilding;

use App\Repository\RequestBuildingRepository;

class UpdateRequestBuildingState
{
    public function __construct(
        private readonly RequestBuildingRepository $repository
    ) {
    }

    public function execute(int $id): void
    {
        $requestBuilding = $this->repository->findOneById($id);

        $requestBuilding->setRequestState('TERMINADO');

        $this->repository->save($requestBuilding);
    }
}
