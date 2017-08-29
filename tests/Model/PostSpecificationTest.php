<?php


namespace Polidog\Blog\Model;


use PHPUnit\Framework\TestCase;

class PostSpecificationTest extends TestCase
{
    public function testIsSatisfiedByTrue()
    {
        $author = new Author(1, "hoge", true);
        $spec = new PostSpecification();
        $this->assertTrue($spec->isSatisfiedBy($author));
    }
}
