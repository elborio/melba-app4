<?php

namespace App\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * GroupInviteRepository
 *
 * This class was generated by the PhpStorm "Php Annotations" Plugin. Add your own custom
 * repository methods below.
 */
class GroupInviteRepository extends EntityRepository
{

    /**
     * @return GroupInvite
     */
    public function findInviteByEmailAndCode($email, $key) {
        return $this->createQueryBuilder('i')
            ->where("i.email = :email")
            ->andWhere("i.inviteKey = :key")
            ->setParameter("email", $email)
            ->setParameter("key", $key)
            ->getQuery()->getOneOrNullResult();
    }
}
