<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 12/06/17
 * Time: 14:37
 */
namespace WCS\AjaxTownBundle\Repository;

/**
 * TownRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TownRepository extends \Doctrine\ORM\EntityRepository
{
    public function GetTownLike($town){
        $town= "%".$town."%";

        $query=$this->createQueryBuilder("ville")
            ->select("ville.town")
            ->where("ville.town LIKE :town")
            ->setParameter("town", $town)
            ->getQuery();

        return $query->getResult();
    }
}