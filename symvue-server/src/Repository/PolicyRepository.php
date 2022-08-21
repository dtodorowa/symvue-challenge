<?php

namespace App\Repository;

use App\Entity\Policy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Policy>
 *
 * @method Policy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Policy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Policy[]    findAll()
 * @method Policy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PolicyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Policy::class);
    }

    public function add(Policy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Policy $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function transform(Policy $policy) {
        return [
            'id' => (int) $policy->getId(),
            'customer' => (object) [
                'name' => (string) $policy->getCustomer()->getName(),
                'address' => (string) $policy->getCustomer()->getAddress() ],
            'client' =>  (string) $policy->getClient()->getName(),
            'type' => (string) $policy->getPolicyType()->getType(),
            'insurer' => (string) $policy->getInsurer()->getName(),
            'premium' => (double) $policy->getPremium()
        ];  
    }

    public function transformAll() {
        $policies = $this->findAll();
        $policyArray = [];

        foreach ($policies as $policy) {
            $policyArray[] = $this->transform($policy);
        }

        return $policyArray;
    }

//    /**
//     * @return Policy[] Returns an array of Policy objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Policy
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
