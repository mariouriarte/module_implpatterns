<?php

namespace App\Controller\Employee;

use App\Service\Employee\FindOneEmployeeByNickname;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/** @Route("/employee") */
class FindOneEmployeeByNicknameController extends AbstractController
{
    public function __construct(
        private readonly FindOneEmployeeByNickname $findOneEmployee,
        private readonly SerializerInterface $serializer
    )
    {
    }

    /** @Route("/nickname/{nickname}", name="find_one_by_nickname", methods={"GET"}) */
    public function __invoke(Request $request): Response
    {
        $dto = $this->findOneEmployee->execute($request->get('nickname'));

        return new JsonResponse($this->serializer->serialize($dto, 'json'), Response::HTTP_OK, [], true);
    }
}
