<?php

namespace App\Service\RequestBuilding;

use App\Dto\Transformer\RequestBuildingTransformerDto;
use App\Repository\RequestBuildingRepository;

class FetchAllRequestsBuilding
{
    public function __construct(
        private readonly RequestBuildingRepository $repository,
        private readonly RequestBuildingTransformerDto $transformerDto
    ) {
    }

    public function execute(): array
    {
        $requests = $this->repository->findAll();

        return $this->transformerDto->transformFromObjects($requests);
    }
}
