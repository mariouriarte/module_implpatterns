<?php

namespace App\Repository;

use App\Entity\Employ;
use App\Service\Employ\Exception\EmployNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employ>
 *
 * @method Employ|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employ|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employ[]    findAll()
 * @method Employ[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employ::class);
    }

    public function findOneByNickname(string $nickname): Employ
    {
        $employ = $this->findOneBy(['nickname' => $nickname]);

        if (null ===  $employ) {
            throw EmployNotFoundException::fromNickname($nickname);
        }

        return $employ;
    }

    public function save(Employ $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Employ $entity, bool $flush = true): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
