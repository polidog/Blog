<?php


namespace Polidog\Blog\Model\Post;


use PHPUnit\Framework\TestCase;
use Polidog\Blog\Model\Post\Author;
use Polidog\Blog\Model\Post\SavePostSpecification;

class SavePostSpecificationTest extends TestCase
{
    public function testIsSatisfiedByTrue()
    {
        $author = new Author(1, "hoge", true);
        $spec = new SavePostSpecification();
        $this->assertTrue($spec->isSatisfiedBy($author));
    }
}
