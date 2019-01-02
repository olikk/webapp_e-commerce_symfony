<?php
// src/Repository/ProductRepository.php
namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }
    /**
     * @param $price
     * @return Product[]
     */
    public function findAllGreaterThanPrice($price): array
    {
        // automatically knows to select Products
        // the "p" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.price > :price')
            ->setParameter('price', $price)
            ->orderBy('p.price', 'ASC')
            ->getQuery();

        return $qb->execute();
    }
 
    /**
     * 
     * @return Product[6]
     */
    public function findBestSales(): array
    {
        // produits vendus plus que 10
        $qb = $this->createQueryBuilder('p')
            ->andWhere('p.vendu > 10')
            ->orderBy('p.vendu', 'Desc')
            ->getQuery()
            ->setMaxResults(6);

        return $qb->execute();

    }
}
?>