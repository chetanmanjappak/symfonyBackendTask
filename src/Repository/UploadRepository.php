<?php
namespace App\Repository;

use App\Entity\Upload;
use App\Entity\UploadBatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class UploadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Upload::class);
    }

    public function findByUploadBatch(UploadBatch $uploadBatch)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.uploadBatch = :uploadBatch')
            ->setParameter('uploadBatch', $uploadBatch)
            ->getQuery()
            ->getResult();
    }
}
