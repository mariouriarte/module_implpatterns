<?php

namespace App\Repository;

use App\Entity\Employee;
use App\Service\Employee\Exception\EmployeeNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employee>
 *
 * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employee[]    findAll()
 * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employee::class);
    }

    public function findOneByNickname(string $nickname): Employee
    {
        $employee = $this->findOneBy(['nickname' => $nickname]);

        if (null ===  $employee) {
            throw EmployeeNotFoundException::fromNickname($nickname);
        }

        return $employee;
    }

    public function findOneById(string $id): Employee
    {
        $employee = $this->find($id);

        if (null ===  $employee) {
            throw EmployeeNotFoundException::fromId($id);
        }

        return $employee;
    }

    public function save(Employee $entity, bool $flush = true): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Employee $entity, bool $flush = true): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
