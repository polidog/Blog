<?php
namespace Polidog\Blog\Model\Post;


use PHPMentors\DomainKata\Entity\EntityInterface;

final class Author implements EntityInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var bool
     */
    private $allowPosting;

    /**
     * @param int    $id
     * @param string $name
     * @param bool   $allowPosting
     */
    public function __construct(int $id, string $name, bool $allowPosting)
    {
        $this->id = $id;
        $this->name = $name;
        $this->allowPosting = $allowPosting;
    }

    public function __toString()
    {
        return $this->name;
    }

    public function isAllowPosting()
    {
        return $this->allowPosting;
    }
}
