<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

class Article
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $displayDate;

    /**
     * @param string    $title
     * @param string    $content
     * @param \DateTime $displayDate
     */
    public function __construct($title, $content, \DateTime $displayDate)
    {
        $this->title = $title;
        $this->content = $content;
        $this->displayDate = $displayDate;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return \DateTime
     */
    public function getDisplayDate(): \DateTime
    {
        return $this->displayDate;
    }
}
