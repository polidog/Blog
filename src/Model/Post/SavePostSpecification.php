<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

/**
 * 記事を投稿できるユーザー仕様.
 *
 * Class SavePostSpecification
 */
final class SavePostSpecification
{
    public function isSatisfiedBy(Author $author)
    {
        return $author->isAllowPosting();
    }
}
