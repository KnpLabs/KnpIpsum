<?php

namespace Knp\IpsumBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ThingRepository extends EntityRepository
{
    /**
     * Return all things whose name contains some string
     * Order by id desc
     * I know, this is heavy stuff.
     *
     * @param string $finish
     * @return Thing[]
     */
    public function findAllWhoseNameContains($text)
    {
        // Note that we use a JOIN to avoid doing multiple requests
        // Your database will be proud of you
        $q = $this->createQueryBuilder('thing')
            ->select('thing, category')
            ->leftJoin('thing.category', 'category')
            ->where('thing.name LIKE :param')
            ->orderBy('thing.id', 'desc')
            ->getQuery()
            ->setParameters(array(
                'param' => '%'.$text.'%',
            ));

        return $q->execute();
    }
}
