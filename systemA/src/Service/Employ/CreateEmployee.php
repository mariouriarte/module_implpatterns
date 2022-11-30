<?php

namespace App\Service\Employ;

use App\Dto\EmployeeDto;
use App\Dto\Transformer\EmployeeTransformerDto;
use App\Entity\Employ;
use App\Repository\EmployRepository;
use App\Service\Employ\ValueObject\CreateEmployInput;

class CreateEmployee
{
    public function __construct(
        private readonly EmployRepository $repository,
        private readonly EmployeeTransformerDto $transformerDto
    ) {
    }

    public function execute(CreateEmployInput $input): EmployeeDto
    {
        $employ = new Employ();
        $employ->setNombres($input->nombres);
        $employ->setApellido1($input->apellido_1);
        $employ->setApellido2($input->apellido_2);
        $employ->setApellido3($input->apellido_3);
        $employ->setNickname($input->nickname);

        $this->repository->save($employ);

        return $this->transformerDto->transformFromObject($employ);
    }
}
