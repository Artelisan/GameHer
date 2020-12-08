<?php


namespace Entity\Blog;

use App\Entity\Blog\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testSetTitle()
    {
        $post = new Post();

        $post->setTitle('New post');

        $this->assertSame('New post', $post->getTitle());
    }

    public function testSetSlug()
    {
        $post = new Post();

        $post->setSlug('Slug');

        $this->assertSame('Slug', $post->getSlug());
    }

    public function testSetContent()
    {
        $post = new Post();

        $post->setContent('Post content');

        $this->assertSame('Post content', $post->getContent());
    }

    public function testNoTagsByDefault()
    {
        $post = new Post();

        $this->assertCount(0, $post->getTags());
    }
}
