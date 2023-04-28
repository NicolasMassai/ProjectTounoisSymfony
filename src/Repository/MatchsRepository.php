<?php

namespace App\Repository;

use App\Entity\Matchs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Matchs>
 *
 * @method Matchs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matchs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matchs[]    findAll()
 * @method Matchs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matchs::class);
    }

    public function save(Matchs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Matchs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }



    public function requete(int $x){
    
        $em = $this->getEntityManager();
    
        $query = $em->createQuery('SELECT m FROM App\Entity\Matchs m WHERE m.id = ' . $x . '');
    
        $result = $query->getResult();
        //dd($result);
        
        return $result;
    }


    /*

    public function requete3(){
        $em = $this->getEntityManager();
    
        $query = $em->createQuery("SELECT e.name,sum(case 
        when 'e.name' = 'equipe_dom' and 'score_dom' > 'score_ext` 
                then 3
        when 'e.name' = 'equipe_dom' and 'score_dom' = 'score_ext'
                then 1
        when 'e.name' = 'equipe_dom' and 'score_dom' < 'score_ext'
                then 0
        when 'e.name' = 'equipe_ext' and 'score_dom' < 'score_ext' 
                then 3
        when 'e.name' = 'equipe_ext' and 'score_dom' = 'score_ext'
                then 1
        when 'e.name' = 'equipe_ext' and  'score_dom' > 'score_ext'
                then 0
        end) AS Points
        FROM App\Entity\Matchs m 
        JOIN Equipe e
        GROUP BY e.name
        ORDER BY Points DESC");
    
        $result = $query->getResult();
        dd($result);
        
        return $result;
    }





    
        /*
        $query = $this->createQueryBuilder('m')
        ->select ('name,sum(case 
            when `name` = `equipe_dom` and `score_dom` > `score_ext` 
                    then 3
            when `name` = `equipe_dom` and `score_dom` = `score_ext`
                    then 1 
            when `name` = `equipe_dom` and `score_dom` < `score_ext`
                    then 0
            when `name` = `equipe_ext` and `score_dom` < `score_ext` 
                    then 3
            when `name` = `equipe_ext` and `score_dom` = `score_ext`
                    then 1
            when `name` = `equipe_ext` and `score_dom` > `score_ext`
                    then 0
            end) AS Points')

        ->from ('Matchs','m')
        ->join ('Equipe', 'e')
        ->groupby ('name')
        ->orderby ('Points DESC')
        ->getQuery();

            
        return $query;
  */
/*
    public function requete2(int $x){
    
        $em = $this->getEntityManager();
    
        $query = $em->createQuery('SELECT m FROM App\Entity\Stade m WHERE m.stade = ' . $x . '');
    
        $result = $query->getResult();
        //dd($result);
        
        return $result;
    }*/

//    /**
//     * @return Matchs[] Returns an array of Matchs objects
//     */
/*
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.score = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
       ;
    }*/

//    public function findOneBySomeField($value): ?Matchs
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}