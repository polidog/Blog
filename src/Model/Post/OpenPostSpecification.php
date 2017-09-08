<?php


namespace Polidog\Blog\Model\Post;


class OpenPostSpecification
{
    public function isSatisfiedBy(Post $post)
    {
        return $post->isOpen();
    }
}

