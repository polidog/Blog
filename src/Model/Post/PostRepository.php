<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

interface PostRepository
{
    public function get(int $id);

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return mixed
     */
    public function findOpenPosts(int $offset, int $limit);

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function store(Post $post);
}
