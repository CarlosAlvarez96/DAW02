<?php

namespace App\Repository;

use App\Entity\Game;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Game>
 *
 * @method Game|null find($id, $lockMode = null, $lockVersion = null)
 * @method Game|null findOneBy(array $criteria, array $orderBy = null)
 * @method Game[]    findAll()
 * @method Game[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Game::class);
    }

//    /**
//     * @return Game[] Returns an array of Game objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Game
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }


   public function getGamesWinsByUser($value): ?int
   {
       $w= $this->createQueryBuilder('g')
           ->select("COUNT(g.id) AS total")
           ->andWhere('g.player = :val AND g.win =1')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
       return $w['total'];
   }


   public function getTopGamer(): array
   {
       return $this->createQueryBuilder('g')
            ->select('MAX(COUNT(g.id)) as total, g.player')
        //    ->orderBy( 'DESC')
           ->groupBy("g.player")
           ->getQuery()
           ->getResult()
       ;
   }
}
