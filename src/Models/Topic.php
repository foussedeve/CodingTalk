<?php

namespace Graph\Models;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ausi\SlugGenerator\SlugGenerator as Sluger;

/**
 * @ORM\Entity
 * @ORM\Table(name="topic")
 */
class Topic
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string",length=255,nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="array",nullable=true)
     */
    private $tags = [];

    /**
     * @ORM\Column(type="boolean")
     */
    private $close;

    /**
     * @ORM\ManyToOne(targetEntity=Forum::class,fetch="EAGER", inversedBy="topics")
     */
    private $forumId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class,fetch="EAGER" , inversedBy="topics")
     */
    private $userId;

    /**
     * @ORM\OneToMany(targetEntity=Answer::class,fetch="EAGER", mappedBy="topicId")
     */
    private $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getTags(): ?array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function getClose(): ?bool
    {
        return $this->close;
    }

    public function setClose(bool $close): self
    {
        $this->close = $close;

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

    public function getUserId(): ?User
    {
       
        return $this->userId->setPassword(null);
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return Collection<int, Answer>
     */
    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
            $answer->setTopicId($this);
        }

        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->removeElement($answer)) {
            // set the owning side to null (unless already changed)
            if ($answer->getTopicId() === $this) {
                $answer->setTopicId(null);
            }
        }

        return $this;
    }


       /**
     * Slug genarator
     * @return string
     */
    public function sluger(){
        $gererator=new Sluger();
        return $gererator->generate($this->title);
    }
}
