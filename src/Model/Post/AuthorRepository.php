<?php

namespace Polidog\Blog\Model\Post;

interface AuthorRepository
{
    public function get(int $id);
}
