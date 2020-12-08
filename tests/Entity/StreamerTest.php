<?php


namespace Entity;


use App\Entity\Streamer;
use PHPUnit\Framework\TestCase;

class StreamerTest extends TestCase
{
	public function testSetName()
	{
		$streamer = new Streamer();

		$streamer->setName('Andrej');

		$this->assertSame('Andrej', $streamer->getName());

	}

	public function testSetChannel()
	{
		$streamer = new Streamer();

		$streamer->setChannel('Twitch');

		$this->assertSame('Twitch', $streamer->getChannel());

	}

}
