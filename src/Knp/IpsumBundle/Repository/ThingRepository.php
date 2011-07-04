<?php

namespace Knp\IpsumBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ThingRepository extends EntityRepository
{
    /**
     * Return all things whose name finish with some string
     * Order by id desc
     * I know, this is heavy stuff.
     *
     * @param string $finish
     * @return Thing[]
     */
    public function findAllWhoseNameFinishWith($finish)
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
                'param' => '%'.$finish,
            ));

        return $q->execute();
    }
}
