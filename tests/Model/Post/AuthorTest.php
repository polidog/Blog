<?php
namespace Polidog\Blog\Model\Post;

use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testIsAllowPostingFalse()
    {
        $author = new Author(1, "hoge", false);
        $this->assertFalse($author->isAllowPosting());
    }
}
