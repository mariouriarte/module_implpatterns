<?php

namespace App\Controller\RequestBuilding;

use App\Service\RequestBuilding\FetchAllRequestsBuilding;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/solicitud") */
class FetchAllRequestsBuildingController extends AbstractController
{
    public function __construct(
        private readonly FetchAllRequestsBuilding $fetchAllEmployees,
        private readonly SerializerInterface $serializer
    ) {
    }

    /** @Route("/", name="fetch_all_employee", methods={"GET"}) */
    public function __invoke(): Response
    {
        $dtos = $this->fetchAllEmployees->execute();

        return new JsonResponse($this->serializer->serialize($dtos, 'json'), Response::HTTP_OK, [], true);
    }
}
