<?php


namespace Entity\Blog;

use App\Entity\Blog\Tag;
use PHPUnit\Framework\TestCase;

class TagTest extends TestCase
{
    public function testSetName()
    {
        $tag = new Tag();

        $tag->setName('New tag');

        $this->assertSame('New tag', $tag->getName());
    }

    public function testSetSlug()
    {
        $tag = new Tag();

        $tag->setSlug('New tag');

        $this->assertSame('New tag', $tag->getSlug());
    }

    public function testNoPostsByDefault()
    {
        $tag = new Tag();

        $this->assertCount(0, $tag->getPosts());
    }
}
