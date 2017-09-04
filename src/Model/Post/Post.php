<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

use PHPMentors\DomainKata\Entity\EntityInterface;

class Post implements EntityInterface
{
    /**
     * @var int
     */
    private $postId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $displayDate;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var PostStatus
     */
    private $status;

    /**
     * @param            $title
     * @param            $content
     * @param \DateTime  $displayDate
     * @param Author     $author
     * @param PostStatus $postStatus
     */
    public function __construct($title, $content, \DateTime $displayDate, Author $author, PostStatus $postStatus)
    {
        $this->title = $title;
        $this->content = $content;
        $this->displayDate = $displayDate;
        $this->author = $author;
        $this->status = $postStatus;
    }

    /**
     * @return int
     */
    public function getPostId(): ?int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     *
     * @return $this
     */
    public function setPostId(int $postId)
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * @return bool
     */
    public function isOpen(): bool
    {
        return $this->status->isPublished();
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getDisplayDate(): \DateTime
    {
        return $this->displayDate;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return PostStatus
     */
    public function getStatus(): PostStatus
    {
        return $this->status;
    }
}
