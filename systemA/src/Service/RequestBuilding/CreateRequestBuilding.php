<?php

namespace App\Service\RequestBuilding;

use App\Dto\RequestBuildingDto;
use App\Dto\Transformer\RequestBuildingTransformerDto;
use App\Entity\RequestBuilding;
use App\Repository\RequestBuildingRepository;
use App\Service\RequestBuilding\ValueObject\CreateRequestBuildingInput;

class CreateRequestBuilding
{
    public function __construct(
        private readonly RequestBuildingRepository $repository,
        private readonly RequestBuildingTransformerDto $transformerDto
    ) {
    }

    public function execute(CreateRequestBuildingInput $input): RequestBuildingDto
    {
        $requestBuilding = new RequestBuilding();
        $requestBuilding->setTitle($input->title);
        $requestBuilding->setDescription($input->description);
        $requestBuilding->setIdWarehouse($input->idWarehouse);

        $this->repository->save($requestBuilding);

        return $this->transformerDto->transformFromObject($requestBuilding);
    }
}
