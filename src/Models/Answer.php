<?php

namespace Graph\Models;


use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="answer")
 */
class Answer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Topic::class, inversedBy="answers")
     */
    private $topicId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="answers")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity=Forum::class, inversedBy="answers")
     */
    private $forumId;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $createdAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTopicId(): ?Topic
    {
        return $this->topicId;
    }

    public function setTopicId(?Topic $topicId): self
    {
        $this->topicId = $topicId;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId->setPassword(null);
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getForumId(): ?Forum
    {
        return $this->forumId;
    }

    public function setForumId(?Forum $forumId): self
    {
        $this->forumId = $forumId;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setCreatedAt( $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
