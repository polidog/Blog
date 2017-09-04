<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Model\Post\OpenPostSpecification;
use Polidog\Blog\Model\Post\PostRepository;

class ListPosts
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function run($offset, $limit)
    {
        $spec = new OpenPostSpecification();
        $this->postRepository->getList($spec, $offset, $limit);
    }
}
