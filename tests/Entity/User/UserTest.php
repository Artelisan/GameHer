<?php


namespace Entity\User;


use App\Entity\User\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
	public function testSetDefaultRole()
	{
		$user = new User();

		$user->setRoles([]);

		$this->assertSame([User::ROLE_DEFAULT], $user->getRoles());

	}

	public function testSetAdminRole()
	{
		$user = $this->createMock(User::class)->setRoles([User::ROLE_DEFAULT]);

		$this->assertSame([], $user->getRoles());
	}

	public function testSetDisplayName()
	{
		$user = new User();

		$user->setDisplayName('Artelisan');

		$this->assertSame('Artelisan', $user->getDisplayName());
	}

	public function testSetFirstName()
	{
		$user = new User();

		$user->setFirstName('Filip');

		$this->assertSame('Filip', $user->getFirstName());
	}

	public function testSetLastName()
	{
		$user = new User();

		$user->setLastName('Dincak');

		$this->assertSame('Dincak', $user->getLastName());
	}

	public function testSetEmail()
	{
		$user = new User();

		$user->setEmail('filip.student@student.tuke.sk');

		$this->assertSame('filip.student@student.tuke.sk', $user->getEmail());
	}

	public function testSetTwitter()
	{
		$user = new User();

		$user->setTwitter('Twitter');

		$this->assertSame('Twitter', $user->getTwitter());
	}

	public function testSetFacebook()
	{
		$user = new User();

		$user->setFacebook('Facebook');

		$this->assertSame('Facebook', $user->getFacebook());
	}

	public function testSetYoutube()
	{
		$user = new User();

		$user->setYoutube('Youtube');

		$this->assertSame('Youtube', $user->getYoutube());
	}

	public function testSetTwitch()
	{
		$user = new User();

		$user->setTwitch('Twitch');

		$this->assertSame('Twitch', $user->getTwitch());
	}

	public function testSetDiscord()
	{
		$user = new User();

		$user->setDiscord('Discord');

		$this->assertSame('Discord', $user->getDiscord());
	}

	public function testSetInstagram()
	{
		$user = new User();

		$user->setInstagram('Instagram');

		$this->assertSame('Instagram', $user->getInstagram());
	}

	public function testNoPostsByDefault()
	{
		$user = new User();

		$this->assertCount(0, $user->getPosts());
	}

	public function testNoStreamsByDefault()
	{
		$user = new User();

		$this->assertCount(0, $user->getStreams());
	}

	public function testNoCommentsByDefault()
	{
		$user = new User();

		$this->assertCount(0, $user->getComments());
	}

}
