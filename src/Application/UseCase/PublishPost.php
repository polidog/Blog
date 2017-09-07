<?php

declare(strict_types=1);

namespace Polidog\Blog\Application\UseCase;

use Polidog\Blog\Model\Post\PostRepository;

class PublishPost
{
    /**
     * @var PostRepository
     */
    private $repository;

    /**
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $postId, int $authorId): void
    {
        $post = $this->repository->get($postId);
        if ($post->author()->id() === $authorId) { // TODO なんかもう少しいい書き方できるだろ・・・
            $post->publish();
            $this->repository->store($post);
        }
    }
}
