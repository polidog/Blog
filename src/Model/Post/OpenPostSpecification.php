<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

class OpenPostSpecification
{
    public function isSatisfiedBy(Post $post)
    {
        return $post->isOpen();
    }
}
