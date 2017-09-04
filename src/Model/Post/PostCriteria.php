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

    /**
     * @param int $status
     *
     * @return $this
     */
    public function setStatus(int $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param string $search
     *
     * @return $this
     */
    public function setSearch(string $search)
    {
        $this->search = $search;

        return $this;
    }
}
