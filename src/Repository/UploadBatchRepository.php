<?php

namespace App\Repository;

use App\Entity\UploadBatch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Constants\Status;

/**
 * @extends ServiceEntityRepository<UploadBatch>
 */
class UploadBatchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UploadBatch::class);
    }

   /**
     * Find uploads with scanning status 'SCANNING-IN-PROGRESS'.
     *
     * @return UploadBatch[]
     */
    public function findScanningInProgressUploads()
    {
        return $this->createQueryBuilder('ub')
            ->innerJoin('ub.uploads', 'up')
            ->innerJoin('up.scan', 'sc')
            ->where('sc.status = :status')
            ->setParameter('status', Status::SCANNING_IN_PROGRESS)
            ->getQuery()
            ->getResult();
    }

}
