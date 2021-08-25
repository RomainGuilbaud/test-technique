<?php

namespace App\Gateway;

/**
 * Interface AbstractRepositoryGateway
 * @package App\Gateway
 */
interface AbstractRepositoryGateway
{
    /**
     * @param $id
     * @param null $lockMode
     * @param null $lockVersion
     * @return mixed
     */
    public function find($id, $lockMode = null, $lockVersion = null);

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @return mixed
     */
    public function findOneBy(array $criteria, array $orderBy = null);

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param array $criteria
     * @param array|null $orderBy
     * @param null $limit
     * @param null $offset
     * @return mixed
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);
}
