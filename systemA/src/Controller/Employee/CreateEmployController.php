<?php

namespace App\Controller\Employee;

use App\Service\Employ\CreateEmploy;
use App\Service\Employ\ValueObject\CreateEmployInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/** @Route("/employee") */
class CreateEmployController extends AbstractController
{
    public function __construct(
        private readonly CreateEmploy $createEmploy
    ) {
    }

    /**
     * @Route("/", name="create_employee", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);

        $input = new CreateEmployInput(
            nombres: $data['nombres'],
            apellido_1: $data['apellido_1'],
            nickname: $data['nickname'],
            apellido_2: $data['apellido_2'],
            apellido_3: $data['apellido_3'],
        );

        $employ = $this->createEmploy->execute($input);

        return new JsonResponse($employ, Response::HTTP_CREATED);
    }
}