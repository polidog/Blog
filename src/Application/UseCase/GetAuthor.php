<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Model\AuthorRepository;

class GetAuthor
{
    /**
     * @var AuthorRepository
     */
    private $authorRepository;


    public function run(int $authorId)
    {
       $author = $this->authorRepository->get($authorId);
       return $author;
    }
}
