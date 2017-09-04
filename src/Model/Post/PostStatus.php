<?php


namespace Polidog\Blog\Model\Post;

class PostStatus
{
    const DRAFT = 1;
    const PUBLISHED = 2;

    /**
     * @var int
     */
    private $status;

    private static $names = [
        self::DRAFT => '非公開記事',
        self::PUBLISHED => '公開記事'
    ];

    /**
     * @param int $status
     */
    private function __construct(int $status)
    {
        $this->status = $status;
    }

    public function __toString()
    {
        return (string)self::$names[$this->status];
    }

    public function draft()
    {
        $this->status = self::DRAFT;
        return $this;
    }

    public function publish()
    {
        $this->status = self::PUBLISHED;
        return $this;
    }

    public function isDraft()
    {
        return $this->status === self::DRAFT;
    }

    public function isPublished()
    {
        return $this->status === self::PUBLISHED;
    }

    public static function newDraft()
    {
        return new self(self::DRAFT);
    }

}
