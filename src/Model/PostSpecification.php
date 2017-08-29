<?php
namespace Polidog\Blog\Model;


final class PostSpecification
{
    public function isSatisfiedBy(Author $author)
    {
        return $author->isAllowPosting();
    }
}
