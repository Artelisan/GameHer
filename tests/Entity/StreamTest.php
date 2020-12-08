<?php


namespace Entity;


use App\Entity\Stream;
use PHPUnit\Framework\TestCase;

class StreamTest extends TestCase
{
	public function testSetStreamName()
	{
		$stream = new Stream();

		$stream->setStreamName('Shooting Night');

		$this->assertSame('Shooting Night', $stream->getStreamName());
	}

	public function testSetActivityName()
	{
		$stream = new Stream();

		$stream->setActivityName('CallOfDuty');

		$this->assertSame('CallOfDuty', $stream->getActivityName());

	}
}

