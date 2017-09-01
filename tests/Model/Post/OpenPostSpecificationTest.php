<?php
namespace Polidog\Blog\Model\Post;

use PHPUnit\Framework\TestCase;

class OpenPostSpecificationTest extends TestCase
{
    public function testIsSatisfiedBy()
    {
        $post = $this->prophesize(Post::class);
        $post->isOpen()->willReturn(true);

        $spec = new OpenPostSpecification();
        $spec->isSatisfiedBy($post->reveal());

        $post->isOpen()->shouldHaveBeenCalled();
    }
}
