<?php

declare(strict_types=1);

namespace Polidog\Blog\Application\UseCase;

use Polidog\Blog\Model\Post\PostCriteria;
use Polidog\Blog\Model\Post\PostRepository;

class ListOpenPosts
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
     * @param              $offset
     * @param              $limit
     * @param PostCriteria $postCriteria
     * @return mixed
     */
    public function run($offset, $limit, PostCriteria $postCriteria)
    {
        return $this->postRepository->postList($offset, $limit, $postCriteria);
    }
}
