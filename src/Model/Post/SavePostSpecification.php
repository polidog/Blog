<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

final class SavePostSpecification
{
    public function isSatisfiedBy(Author $author)
    {
        return $author->isAllowPosting();
    }
}
