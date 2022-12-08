<?php

namespace App\Controller\RequestBuilding;

use App\Service\RequestBuilding\UpdateRequestBuildingState;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/solicitud") */
class UpdateRequestBuildingController extends AbstractController
{
    public function __construct(
        private readonly UpdateRequestBuildingState $updater,
        private readonly SerializerInterface $serializer
    ) {
    }

    /** @Route("/{id}", name="update_employee_id", methods={"PUT"}) */
    public function __invoke(int $id): Response
    {
        $this->updater->execute($id);

        return new JsonResponse(
            $this->serializer->serialize(['statusCode' => 200], 'json'),
            Response::HTTP_OK, [],
            true
        );
    }
}
