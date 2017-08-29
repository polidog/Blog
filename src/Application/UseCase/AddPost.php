<?php


namespace Polidog\Blog\Application\UseCase;


use Polidog\Blog\Application\TransactionManager;
use Polidog\Blog\Model\Post\AuthorRepository;
use Polidog\Blog\Model\Post\Post;
use Polidog\Blog\Model\Post\PostNotFoundException;
use Polidog\Blog\Model\Post\PostRepositoryInterface;
use Polidog\Blog\Model\Post\PostSpecification;
use Polidog\Blog\Model\Post\PostStatus;

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


    public function run(int $authorId, \DateTime $displayDate, string $title, string $content)
    {
        $postStatus = PostStatus::newDraft();
        $author = $this->authorRepository->get($authorId);

        $spec = new PostSpecification();
        if (false === $spec->isSatisfiedBy($author)) {
            throw new PostNotFoundException(); // TODO error message.
        }

        $post = new Post($title, $content, $displayDate, $author, $postStatus);

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
