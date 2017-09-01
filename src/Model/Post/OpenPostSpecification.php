<?php
namespace Polidog\Blog\Model\Post;

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
