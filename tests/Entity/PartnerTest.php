<?php


namespace Entity;


use App\Entity\Partner;
use PHPUnit\Framework\TestCase;

class PartnerTest extends TestCase
{
	public function testSetName()
	{
		$partner = new Partner();

		$partner->setName('Andrej');

		$this->assertSame('Andrej', $partner->getName());
	}

	public function testSetDescription()
	{
		$partner = new Partner();

		$partner->setDescription('New partner');

		$this->assertSame('New partner', $partner->getDescription());
	}

	public function testSetWebsite()
	{
		$partner = new Partner();

		$partner->setWebsite('www.testwebsite.com');

		$this->assertSame('www.testwebsite.com', $partner->getWebsite());
	}

	public function testSetTwitter()
	{
		$partner = new Partner();

		$partner->setTwitter('Twitter');

		$this->assertSame('Twitter', $partner->getTwitter());
	}

	public function testSetFacebook()
	{
		$partner = new Partner();

		$partner->setFacebook('Facebook');

		$this->assertSame('Facebook', $partner->getFacebook());
	}

	public function testSetInstagram()
	{
		$partner = new Partner();

		$partner->setInstagram('Instagram');

		$this->assertSame('Instagram', $partner->getInstagram());
	}

}
