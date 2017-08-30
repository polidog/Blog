<?php


namespace vendor\polidog\blog\src\Model\Post;



use Polidog\Blog\Model\Post\Post;
use Polidog\Blog\Model\Post\PostStatus;

class OpenPostSpecification
{
    public function isSatisfiedBy(Post $post) :bool
    {
        return $post->isOpen();
    }

    public function condition()
    {
        foreach (['status' => PostStatus::PUBLISHED] as $column => $value) {
            yield $column => $value;
        }
    }

}
