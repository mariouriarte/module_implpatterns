<?php

namespace App\Dto;

class RequestBuildingDto
{
    public function __construct(
        public readonly int $idSolicutd,
        public readonly string $titulo,
        public readonly string $descripcion,
        public readonly string $estadoSolicitud,
        public readonly \DateTimeInterface $fechaSolicitud,
        public readonly int $idSolicitudAlmacen,
    ) {
    }
}
