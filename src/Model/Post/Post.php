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
     * @var Article
     */
    private $article;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var PostStatus
     */
    private $status;

    public function __construct(Author $author, PostStatus $postStatus)
    {
        $this->author = $author;
        $this->status = $postStatus;
    }

    public function isOpen(): bool
    {
        return $this->status->isPublished();
    }

    public function update(Article $article): void
    {
        $this->article = $article;
    }

    public function publish(): void
    {
        $this->status->publish();
    }

    public function getPostId(): ?int
    {
        return $this->postId;
    }

    public function setPostId(int $postId): Post
    {
        $this->postId = $postId;

        return $this;
    }

    public function getAuthor(): Author
    {
        return $this->author;
    }

    public function getStatus(): PostStatus
    {
        return $this->status;
    }

    public static function newPost(Article $article, Author $author, PostStatus $postStatus)
    {
        $self = new self($author, $postStatus);
        $self->update($article);

        return $self;
    }
}
