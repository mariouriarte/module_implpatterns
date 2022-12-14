<?php

namespace App\Controller\RequestBuilding;

use App\Service\RequestBuilding\RemoveRequestBuilding;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/solicitud") */
class RemoveRequestBuildingController extends AbstractController
{
    public function __construct(
        private readonly RemoveRequestBuilding $removeEmployee,
        private readonly SerializerInterface $serializer
    ) {
    }

    /** @Route("/{id}", name="remove_employee_id", methods={"DELETE"}) */
    public function __invoke(Request $request): Response
    {
        $this->removeEmployee->remove($request->get('id'));

        return new JsonResponse($this->serializer->serialize(['statusCode' => 200], 'json'), Response::HTTP_OK, [],
            true);
    }
}
