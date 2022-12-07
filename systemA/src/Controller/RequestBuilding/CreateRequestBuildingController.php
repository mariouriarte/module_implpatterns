<?php

namespace App\Controller\RequestBuilding;

use App\Service\RequestBuilding\CreateRequestBuilding;
use App\Service\RequestBuilding\ValueObject\CreateRequestBuildingInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/solicitud") */
class CreateRequestBuildingController extends AbstractController
{
    public function __construct(
        private readonly CreateRequestBuilding $createEmployee,
        private readonly SerializerInterface $serializer
    ) {
    }

    /**
     * @Route("/", name="create_employee", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $input = new CreateRequestBuildingInput(
            title: $data['titulo'],
            description: $data['descripcion'],
            idWarehouse: 1
        );

        $dto = $this->createEmployee->execute($input);

        return new JsonResponse($this->serializer->serialize($dto, 'json'), Response::HTTP_CREATED, [], true);
    }
}
