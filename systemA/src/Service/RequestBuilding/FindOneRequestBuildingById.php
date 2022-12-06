<?php

namespace App\Service\RequestBuilding;

use App\Dto\RequestBuildingDto;
use App\Dto\Transformer\RequestBuildingTransformerDto;
use App\Repository\RequestBuildingRepository;

class FindOneRequestBuildingById
{
    public function __construct(
        private readonly RequestBuildingRepository $repository,
        private readonly RequestBuildingTransformerDto $transformerDto
    ) {
    }

    public function execute(string $id): RequestBuildingDto
    {
        $requests = $this->repository->findOneById($id);

        return $this->transformerDto->transformFromObject($requests);
    }
}
