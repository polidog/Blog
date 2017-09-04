<?php


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

    public function run(int $postId)
    {
        $post = $this->repository->get($postId);
        $post->publish();
        $this->repository->store($post);
    }

}
