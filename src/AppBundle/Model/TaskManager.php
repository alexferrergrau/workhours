<?php

namespace AppBundle\Model;

use AppBundle\Entity\Task;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\SecurityContext;

class TaskManager {

    private $repository;
    private $context;

    /**
     * TaskManager constructor.
     * @param ObjectManager $om
     * @param SecurityContext $context
     */
    public function __construct(Container $container)
    {
        $this->em = $container->get('doctrine');
        $this->repository = $this->em->getRepository('AppBundle:Task');
    }

    /**
     * @param $hours
     * @return array
     */
    public function findAllTasks()
    {
        return $this->repository->findAll();
    }


    /**
     * @param $hours
     * @return array
     */
    public function findTasksByDurationEqualsTo($hours)
    {
        $qb = $this->repository->createQueryBuilder('t')
            ->where('t.hours = :hours')
            ->setParameter('hours', $hours)
            ->orderBy('t.hours', 'ASC')
            ->getQuery();

        return $qb->getResult();
    }

    /**
     * @param $hours
     * @return array
     */
    public function findTasksByDurationBiggerThan($hours)
    {
        $qb = $this->repository->createQueryBuilder('t')
            ->where('t.hours > :hours')
            ->setParameter('hours', $hours)
            ->orderBy('t.hours', 'ASC')
            ->getQuery();

        return $qb->getResult();
    }

}