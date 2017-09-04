<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

interface PostRepository
{
    public function get(int $id);

    /**
     * @param int               $offset
     * @param int               $limit
     * @param PostCriteria|null $criteria
     *
     * @return []Post
     */
    public function postList(int $offset, int $limit, PostCriteria $criteria = null);

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function store(Post $post);
}
