<?php

namespace App\Repository;

use App\Entity\RequestBuilding;
use App\Service\RequestBuilding\Exception\RequestBuildingNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RequestBuilding>
 *
 * @method RequestBuilding|null find($id, $lockMode = null, $lockVersion = null)
 * @method RequestBuilding|null findOneBy(array $criteria, array $orderBy = null)
 * @method RequestBuilding[]    findAll()
 * @method RequestBuilding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RequestBuildingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RequestBuilding::class);
    }

    public function findOneById(int $id): RequestBuilding
    {
        $employee = $this->find($id);

        if (null ===  $employee) {
            throw RequestBuildingNotFoundException::fromId($id);
        }

        return $employee;
    }

    public function save(RequestBuilding $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RequestBuilding $entity, bool $flush = true): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
