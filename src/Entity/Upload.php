<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="upload", indexes={@ORM\Index(name="idx_batch_id", columns={"batch_id"})})
 */
class Upload
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="string")
     */
    private string $filename;

    /**
     * @ORM\Column(type="string")
     */
    private string $filePath;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $uploadDate;

    /**
     * @ORM\Column(type="string")
     */
    private string $status;

    /**
     * @ORM\Column(type="string")
     */
    private string $fileType;

    /**
     * @ORM\ManyToOne(targetEntity="UploadBatch")
     * @ORM\JoinColumn(name="batch_id", referencedColumnName="id")
     */
    private ?UploadBatch $uploadBatch = null;

     /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Scan", mappedBy="upload", cascade={"persist", "remove"})
     */
    private $scan;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileName(): ?string
    {
        return $this->filename;
    }

    public function setFileName(string $filename): self
    {
        $this->filename = $filename;
        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;
        return $this;
    }

    public function getUploadDate(): ?\DateTimeInterface
    {
        return $this->uploadDate;
    }
    /**
     * @ORM\PreUpdate
     */
    public function setUploadDate(\DateTimeInterface $uploadDate): self
    {
        $this->uploadDate = $uploadDate;
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

    public function getFileType(): ?string
    {
        return $this->fileType;
    }

    public function setFileType(string $fileType): self
    {
        $this->fileType = $fileType;
        return $this;
    }

    public function getUploadBatch(): ?UploadBatch
    {
        return $this->uploadBatch;
    }

    public function setUploadBatch(?UploadBatch $uploadBatch): self
    {
        $this->uploadBatch = $uploadBatch;
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
