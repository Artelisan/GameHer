<?php


namespace Entity\Team;


use App\Entity\Team\EsportMember;
use PHPUnit\Framework\TestCase;

class EsportMemberTest extends TestCase
{
	public function testSetGame()
	{
		$esportMember = new EsportMember();

		$esportMember->setGame(EsportMember::GAME_LEAGUE_OF_LEGENDS);

		$this->assertContains(EsportMember::GAME_LEAGUE_OF_LEGENDS, $esportMember->getAvailableGames());
		$this->assertSame(EsportMember::GAME_LEAGUE_OF_LEGENDS, $esportMember->getGame());
	}

	public function testSetTeam()
	{
		$esportMember = new EsportMember();

		$esportMember->setTeam(EsportMember::MAIN_TEAM);

		$this->assertContains(EsportMember::MAIN_TEAM, $esportMember->getAvailableTeams());
		$this->assertSame(EsportMember::MAIN_TEAM, $esportMember->getTeam());
	}

	public function testSetRole()
	{
		$esportMember = new EsportMember();

		$esportMember->setRole(EsportMember::ROLE_TOP);

		$this->assertSame(EsportMember::ROLE_TOP, $esportMember->getRole());
	}

}
