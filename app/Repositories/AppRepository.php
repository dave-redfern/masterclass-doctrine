<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;

/**
 * Class AppRepository
 *
 * @package    App\Repositories
 * @subpackage App\Repositories\AppRepository
 */
abstract class AppRepository extends EntityRepository
{

    /**
     * @param mixed $entity
     */
    public function save($entity)
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush($entity);
    }

    /**
     * @param mixed $entity
     */
    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush($entity);
    }
}