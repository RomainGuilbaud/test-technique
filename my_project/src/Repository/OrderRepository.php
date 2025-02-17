<?php

namespace App\Repository;

use App\Entity\Order;
use App\Gateway\OrderRepositoryGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository implements OrderRepositoryGateway
{
    /**
     * OrderRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * @param Order $order
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Order $order): void
    {
        $this->_em->persist($order);
        try {
            $this->_em->flush();
        } catch (OptimisticLockException | ORMException $e) {
            throw $e;
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function update(): void
    {
        try {
            $this->_em->flush();
        } catch (OptimisticLockException | ORMException $e) {
            throw $e;
        }
    }
}
