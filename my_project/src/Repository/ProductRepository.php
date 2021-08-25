<?php

namespace App\Repository;

use App\Entity\Product;
use App\Gateway\ProductRepositoryGateway;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository implements ProductRepositoryGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param Product $product
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function save(Product $product): void
    {
        $this->_em->persist($product);
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
