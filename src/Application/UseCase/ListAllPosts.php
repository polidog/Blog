<?php

declare(strict_types=1);

namespace Polidog\Blog\Application\UseCase;

use Polidog\Blog\Model\Post\PostRepository;

class ListAllPosts
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

    /**
     * @param $offset
     * @param $limit
     *
     * @return []Post
     */
    public function run($offset, $limit)
    {
        return $this->postRepository->postList($offset, $limit);
    }
}
