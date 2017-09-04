<?php


namespace Polidog\Blog\Model\Post;


use PHPUnit\Framework\TestCase;

class PostStatusTest extends TestCase
{
    public function testDraft()
    {
        $status = PostStatus::newDraft();
        $this->assertTrue($status->isDraft());
        $status->publish();
        $this->assertFalse($status->isDraft());
        $status->draft();
        $this->assertTrue($status->isDraft());
    }

    public function testPublished()
    {
        $status = PostStatus::newDraft();
        $status->publish();
        $this->assertTrue($status->isPublished());
    }

}
