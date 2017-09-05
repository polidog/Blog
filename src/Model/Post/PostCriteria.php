<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

use PHPMentors\DomainKata\Repository\Operation\CriteriaBuilderInterface;

abstract class PostCriteria implements CriteriaBuilderInterface
{
    /**
     * @var int
     */
    protected $status;

    /**
     * @var string
     */
    protected $search;

    public function setStatus(int $status): PostCriteria
    {
        $this->status = $status;

        return $this;
    }

    public function setSearch(string $search): PostCriteria
    {
        $this->search = $search;

        return $this;
    }
}
