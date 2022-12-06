<?php

namespace App\Service\RequestBuilding\ValueObject;

class CreateRequestBuildingInput
{
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public int $idWarehouse
    ) {
    }
}
