<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

interface PostRepository
{
    public function get(int $id);

    /**
     * @param int          $offset
     * @param int          $limit
     * @param PostCriteria|null $criteria
     * @return []Post
     */
    public function postList(int $offset, int $limit, PostCriteria $criteria = null);

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return []Post
     */
    public function findOpenPosts(int $offset, int $limit);

    /**
     * @param int $offset
     * @param int $limit
     * @return []Post
     */
    public function findAllPosts(int $offset, int $limit);

    /**
     * @param Post $post
     *
     * @return mixed
     */
    public function store(Post $post);
}
