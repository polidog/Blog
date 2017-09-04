<?php

declare(strict_types=1);

namespace Polidog\Blog\Model\Post;

interface AuthorRepository
{
    public function get(int $id);
}
