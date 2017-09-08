<?php

declare(strict_types=1);

namespace Polidog\Blog\Application\UseCase;

use Polidog\Blog\Model\Post\OpenPostSpecification;
use Polidog\Blog\Model\Post\PostRepository;

class ShowPost
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * @var OpenPostSpecification
     */
    private $spec;

    /**
     * @param PostRepository        $postRepository
     * @param OpenPostSpecification $spec
     */
    public function __construct(PostRepository $postRepository, OpenPostSpecification $spec)
    {
        $this->postRepository = $postRepository;
        $this->spec = $spec;
    }

    public function run(int $id)
    {
        $post = $this->postRepository->get($id);
        if (false === $this->spec->isSatisfiedBy($post)) {
            // TODO custom exception.
            throw new \RuntimeException();
        }

        return $post;
    }
}
