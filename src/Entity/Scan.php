<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

/**
 * @ORM\Entity
 * @ORM\Table(name="scan", indexes={@ORM\Index(name="idx_upload_id", columns={"upload_id"})})
 */
class Scan
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id = null;

    /**
     * @ORM\Column(type="integer")
     */
    private int $ciUploadId = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $uploadProgramsFileId = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $totalScans = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $remainingScans = 0;

    /**
     * @ORM\Column(type="float", options={"default" : 0})
     */
    private float $percentage = 0.0;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private ?string $estimatedDaysLeft = null;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $repositoryId = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $commitId = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $vulnerabilitiesFound = 0;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private int $unaffectedVulnerabilitiesFound = 0;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private ?string $automationsAction = null;

    /**
     * @ORM\Column(type="string", length=45, nullable=true)
     */
    private ?string $policyEngineAction = null;

    /**
     * @ORM\Column(type="string")
     */
    private string $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTimeInterface $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="Upload")
     * @ORM\JoinColumn(name="upload_id", referencedColumnName="id")
     */
    private ?Upload $upload = null;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $message;

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTime();
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

    public function getCiUploadId(): ?int
    {
        return $this->ciUploadId;
    }

    public function setCiUploadId(int $ciUploadId): self
    {
        $this->ciUploadId = $ciUploadId;
        return $this;
    }

    public function getUploadProgramsFileId(): ?int
    {
        return $this->uploadProgramsFileId;
    }

    public function setUploadProgramsFileId(int $uploadProgramsFileId): self
    {
        $this->uploadProgramsFileId = $uploadProgramsFileId;
        return $this;
    }

    public function getTotalScans(): ?int
    {
        return $this->totalScans;
    }

    public function setTotalScans(int $totalScans): self
    {
        $this->totalScans = $totalScans;
        return $this;
    }

    public function getRemainingScans(): ?int
    {
        return $this->remainingScans;
    }

    public function setRemainingScans(int $remainingScans): self
    {
        $this->remainingScans = $remainingScans;
        return $this;
    }

    public function getPercentage(): ?float
    {
        return $this->percentage;
    }

    public function setPercentage(float $percentage): self
    {
        $this->percentage = $percentage;
        return $this;
    }

    public function getEstimatedDaysLeft(): ?string
    {
        return $this->estimatedDaysLeft;
    }

    public function setEstimatedDaysLeft(?string $estimatedDaysLeft): self
    {
        $this->estimatedDaysLeft = $estimatedDaysLeft;
        return $this;
    }

    public function getRepositoryId(): ?int
    {
        return $this->repositoryId;
    }

    public function setRepositoryId(int $repositoryId): self
    {
        $this->repositoryId = $repositoryId;
        return $this;
    }

    public function getCommitId(): ?int
    {
        return $this->commitId;
    }

    public function setCommitId(int $commitId): self
    {
        $this->commitId = $commitId;
        return $this;
    }

    public function getVulnerabilitiesFound(): ?int
    {
        return $this->vulnerabilitiesFound;
    }

    public function setVulnerabilitiesFound(int $vulnerabilitiesFound): self
    {
        $this->vulnerabilitiesFound = $vulnerabilitiesFound;
        return $this;
    }

    public function getUnaffectedVulnerabilitiesFound(): ?int
    {
        return $this->unaffectedVulnerabilitiesFound;
    }

    public function setUnaffectedVulnerabilitiesFound(int $unaffectedVulnerabilitiesFound): self
    {
        $this->unaffectedVulnerabilitiesFound = $unaffectedVulnerabilitiesFound;
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

    public function getAutomationsAction(): ?string
    {
        return $this->automationsAction;
    }

    public function setAutomationsAction(?string $automationsAction): self
    {
        $this->automationsAction = $automationsAction;
        return $this;
    }

    public function getPolicyEngineAction(): ?string
    {
        return $this->policyEngineAction;
    }

    public function setPolicyEngineAction(?string $policyEngineAction): self
    {
        $this->policyEngineAction = $policyEngineAction;
        return $this;
    }

    public function getUpload(): ?Upload
    {
        return $this->upload;
    }

    public function setUpload(?Upload $upload): self
    {
        $this->upload = $upload;
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
