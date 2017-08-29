<?php
namespace Polidog\Blog\Model\Post;

final class PostSpecification
{
    public function isSatisfiedBy(Author $author)
    {
        return $author->isAllowPosting();
    }
}
