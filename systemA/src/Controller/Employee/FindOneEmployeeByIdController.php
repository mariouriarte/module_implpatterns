<?php

namespace App\Controller\Employee;

use App\Service\Employee\FindOneEmployeeById;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/employee") */
class FindOneEmployeeByIdController extends AbstractController
{
    public function __construct(
        private readonly FindOneEmployeeById $findOneEmployee,
        private readonly SerializerInterface $serializer
    )
    {
    }

    /** @Route("/{id}", name="find_one_by_id", methods={"GET"}) */
    public function __invoke(Request $request): Response
    {
        $dto = $this->findOneEmployee->execute($request->get('id'));

        return new JsonResponse($this->serializer->serialize($dto, 'json'), Response::HTTP_OK, [], true);
    }
}
