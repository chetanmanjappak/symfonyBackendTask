<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use App\Repository\UploadBatchRepository;

/**
 * @ORM\Entity(repositoryClass=UploadBatchRepository::class)
 * @ORM\Table(name="upload_batch")
 * @ORM\HasLifecycleCallbacks
 */
class UploadBatch
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type=Types::INTEGER)
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type=Types::STRING, length=45)
     */
    private string $batchName;

    /**
     * @ORM\Column(type=Types::INTEGER)
     */
    private int $totalReceivedFiles = 0;

    /**
     * @ORM\Column(type=Types::INTEGER, options={"default": 0})
     */
    private int $totalUploadedFiles = 0;

    /**
     * @ORM\Column(type=Types::INTEGER, options={"default": 0})
     */
    private int $totalFailedUpload = 0;

    /**
     * @ORM\Column(type=Types::INTEGER, options={"default": 0})
     */
    private int $totalScanned = 0;

    /**
     * @ORM\Column(type=Types::STRING, length=45)
     */
    private string $status = 'UPLOAD-IN-QUEUE';

    /**
     * @ORM\Column(type=Types::DATETIME_MUTABLE)
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type=Types::DATETIME_MUTABLE)
     */
    private \DateTimeInterface $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    private User $user;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Upload", mappedBy="uploadBatch")
     */
    private $uploads;

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime(); // Ensure `updatedAt` is also initialized on create
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBatchName(): string
    {
        return $this->batchName;
    }

    public function setBatchName(string $batchName): self
    {
        $this->batchName = $batchName;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getTotalReceivedFiles(): int
    {
        return $this->totalReceivedFiles;
    }

    public function setTotalReceivedFiles(int $totalReceivedFiles): self
    {
        $this->totalReceivedFiles = $totalReceivedFiles;
        return $this;
    }

    public function getTotalUploadedFiles(): int
    {
        return $this->totalUploadedFiles;
    }

    public function setTotalUploadedFiles(int $totalUploadedFiles): self
    {
        $this->totalUploadedFiles = $totalUploadedFiles;
        return $this;
    }

    public function getTotalFailedUpload(): int
    {
        return $this->totalFailedUpload;
    }

    public function setTotalFailedUpload(int $totalFailedUpload): self
    {
        $this->totalFailedUpload = $totalFailedUpload;
        return $this;
    }

    public function getTotalScanned(): int
    {
        return $this->totalScanned;
    }

    public function setTotalScanned(int $totalScanned): self
    {
        $this->totalScanned = $totalScanned;
        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }
}
