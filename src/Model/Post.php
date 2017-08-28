<?php


namespace Polidog\Blog\Model;


use Polidog\Blog\Application\Dto\DtoInterface;

final class Post
{
    /**
     * @var integer
     */
    private $id;

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
     * @var Author
     */
    private $author;

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

    public function transfer(DtoInterface $dto)
    {
        $dto->inject($this->output());
    }

    private function output()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'displayDate' => $this->displayDate,
            'author' => $this->author, // TODO これ微妙なんだけどどうするか・・・。
        ];
    }

}
