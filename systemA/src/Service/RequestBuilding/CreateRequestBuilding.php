<?php

namespace App\Service\RequestBuilding;

use App\Dto\RequestBuildingDto;
use App\Dto\Transformer\RequestBuildingTransformerDto;
use App\Entity\RequestBuilding;
use App\Infrastructure\Exception\HttpClientWarehouseException;
use App\Infrastructure\HttpClientWarehouse;
use App\Repository\RequestBuildingRepository;
use App\Service\RequestBuilding\ValueObject\CreateRequestBuildingInput;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateRequestBuilding
{
    public function __construct(
        private readonly RequestBuildingRepository $repository,
        private readonly RequestBuildingTransformerDto $transformerDto,
        private readonly RemoveRequestBuilding $removeRequestBuilding
    ) {
    }

    public function execute(CreateRequestBuildingInput $input): RequestBuildingDto
    {
        $requestBuilding = new RequestBuilding();
        $requestBuilding->setTitle($input->title);
        $requestBuilding->setDescription($input->description);
        $requestBuilding->setIdWarehouse(0);

        $this->repository->save($requestBuilding);

        try {
            $this->updateRequestWhitWarehouseId($requestBuilding);
        } catch (HttpClientWarehouseException $e) {
            $this->removeRequest($requestBuilding->getId());
            throw new NotFoundHttpException($e->getMessage());
        }

        return $this->transformerDto->transformFromObject($requestBuilding);
    }

    private function updateRequestWhitWarehouseId(RequestBuilding $requestBuilding): void
    {
        $httpClientWarehouse = new HttpClientWarehouse();
        $warehouseId = $httpClientWarehouse->__invoke($requestBuilding->getId());

        $requestBuilding->setIdWarehouse($warehouseId);
        $this->repository->save($requestBuilding);
    }

    private function removeRequest(int $id): void
    {
        $this->removeRequestBuilding->remove($id);
    }
}
