<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Model\Post\PostRepository;
use vendor\polidog\blog\src\Model\Post\OpenPostSpecification;

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
