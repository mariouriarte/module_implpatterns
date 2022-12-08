<?php

namespace App\Dto\Transformer;

use App\Dto\RequestBuildingDto;
use App\Entity\RequestBuilding;

class RequestBuildingTransformerDto extends AbstractResponseDtoTransformer
{
    /**
     * @param RequestBuilding $object
     *
     * @return RequestBuildingDto
     */
    public function transformFromObject($object): RequestBuildingDto
    {
        return new RequestBuildingDto(
            idSolicitud: $object->getId(),
            titulo: $object->getTitle(),
            descripcion: $object->getDescription(),
            estadoSolicitud: $object->getRequestState(),
            fechaSolicitud: $object->getRequestDate(),
            idSolicitudAlmacen: $object->getIdWarehouse()
        );
    }
}
