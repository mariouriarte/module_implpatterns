<?php

namespace App\Controller\Employee;

use App\Service\Employ\FetchAllEmployees;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/employee") */
class FetchAllEmployeesController extends AbstractController
{
    public function __construct(
        private readonly FetchAllEmployees $fetchAllEmployees,
        private readonly SerializerInterface $serializer
    )
    {
    }

    /** @Route("/", name="fetch_all_employee", methods={"GET"}) */
    public function __invoke(): Response
    {
        $dtos = $this->fetchAllEmployees->execute();

        return new JsonResponse($this->serializer->serialize($dtos, 'json'), Response::HTTP_OK, [], true);
    }
}
