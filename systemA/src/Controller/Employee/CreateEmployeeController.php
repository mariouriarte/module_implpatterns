<?php

namespace App\Controller\Employee;

use App\Service\Employ\CreateEmployee;
use App\Service\Employ\ValueObject\CreateEmployInput;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/employee") */
class CreateEmployeeController extends AbstractController
{
    public function __construct(
        private readonly CreateEmployee $createEmployee,
        private readonly SerializerInterface $serializer
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

        $dto = $this->createEmployee->execute($input);

        return new JsonResponse($this->serializer->serialize($dto, 'json'), Response::HTTP_CREATED, [], true);
    }
}
