<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Application\TransactionManager;
use Polidog\Blog\Model\Author;
use Polidog\Blog\Model\AuthorRepository;
use Polidog\Blog\Model\Post;
use Polidog\Blog\Model\PostNotFoundException;
use Polidog\Blog\Model\PostRepositoryInterface;
use Polidog\Blog\Model\PostSpecification;
use Polidog\Blog\Model\PostStatus;

class AddPost
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    /**
     * @var AuthorRepository
     */
    private $authorRepository;

    /**
     * @var TransactionManager
     */
    private $transactionManager;

    /**
     * @param PostRepositoryInterface $postRepository
     * @param AuthorRepository        $authorRepository
     * @param TransactionManager      $transactionManager
     */
    public function __construct(PostRepositoryInterface $postRepository, AuthorRepository $authorRepository, TransactionManager $transactionManager)
    {
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
        $this->transactionManager = $transactionManager;
    }


    public function run(Author $author, \DateTime $displayDate, string $title, string $content)
    {
        $postStatus = PostStatus::newDraft();
        $post = new Post($title, $content, $displayDate, $author, $postStatus);
        $spec = new PostSpecification();
        if (false === $spec->isSatisfiedBy($author)) {
            throw new PostNotFoundException(); // TODO error message.
        }

        $this->transactionManager->begin();
        try {
            $this->postRepository->store($post);
            $this->transactionManager->commit();
            return $post->getPostId();
        } catch (\Exception $e) {
            $this->transactionManager->rollback();
            throw $e;
        }
    }

}
