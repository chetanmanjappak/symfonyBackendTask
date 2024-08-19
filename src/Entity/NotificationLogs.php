<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="notification")
 */
class NotificationLogs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private User $user;

    /**
     * @ORM\Column(type="string")
     */
    private $category;

    /**
     * @ORM\Column(type="string")
     */
    private $notificationType;

    /**
     * @ORM\Column(type="text")
     */
    private $message;

    /**
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @ORM\Column(type="datetime")
     */
    private $sentAt;

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }
    public function setCategory(?string $category): self
    {
        $this->category = $category;
        return $this;
    }
    public function setNotificationType(?string $notificationType): self
    {
        $this->notificationType = $notificationType;
        return $this;
    }
    public function setMessage(?string $message): self
    {
        $this->message = $message;
        return $this;
    }
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }
    /**
     * @ORM\PrePersist
     */
    public function setSentAt(): self
    {
        $this->sentAt = new \DateTime();
        return $this;
    }

}
