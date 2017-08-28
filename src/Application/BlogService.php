<?php


namespace Polidog\Blog\Application;


use Polidog\Blog\Model\Post;

class BlogService
{
    public function newPost(string $title, string $content, int $authorId)
    {
        $post = new Post($title, $content, new \DateTime());
    }
}
