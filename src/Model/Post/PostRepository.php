<?php


namespace Polidog\Blog\Model\Post;

use PHPMentors\DomainKata\Entity\CriteriaInterface;
use vendor\polidog\blog\src\Model\Post\OpenPostSpecification;

interface PostRepository
{
    public function get(int $id);

    /**
     * @param OpenPostSpecification $spec
     * @param int                   $offset
     * @param int                   $limit
     * @return mixed
     */
    public function getList(OpenPostSpecification $spec, int $offset, int $limit);

    /**
     * @param Post $post
     * @return mixed
     */
    public function store(Post $post);
}
