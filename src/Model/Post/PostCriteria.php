<?php


namespace Polidog\Blog\Model\Post;


use PHPMentors\DomainKata\Repository\Operation\CriteriaBuilderInterface;

abstract class PostCriteria implements CriteriaBuilderInterface
{
    /**
     * @var PostStatus
     */
    private $status;

    /**
     * @var string
     */
    private $search;

    /**
     * @param PostStatus $status
     * @return $this
     */
    public function setStatus(PostStatus $status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param string $search
     * @return $this
     */
    public function setSearch(string $search)
    {
        $this->search = $search;
        return $this;
    }



}
