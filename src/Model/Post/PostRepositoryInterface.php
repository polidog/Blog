<?php


namespace Polidog\Blog\Model\Post;

use PHPMentors\DomainKata\Entity\CriteriaInterface;

interface PostRepositoryInterface
{
    public function get(int $id);

    /**
     * @param CriteriaInterface $criteria
     * @param int               $offset
     * @param int               $limit
     * @return []Post
     */
    public function getList(CriteriaInterface $criteria, int $offset, int $limit);

    /**
     * @param Post $post
     * @return mixed
     */
    public function store(Post $post);
}
