<?php

namespace App\Repository;

use App\Entity\Item;
use App\Gateway\ItemRepositoryGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Item|null find($id, $lockMode = null, $lockVersion = null)
 * @method Item|null findOneBy(array $criteria, array $orderBy = null)
 * @method Item[]    findAll()
 * @method Item[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ItemRepository extends ServiceEntityRepository implements ItemRepositoryGateway
{
    /**
     * ItemRepository constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Item::class);
    }

    /**
     * @param Item $item
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Item $item): void
    {
        $this->_em->persist($item);
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
