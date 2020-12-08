<?php


namespace Entity\Team;


use App\Entity\Team\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
	public function testSetCategory()
	{
		$role = new Role();

		$role->setCategory('members');

		$this->assertSame(Role::CATEGORY_MEMBERS, $role->getCategory());
	}

	public function testSetName()
	{
		$role = new Role();

		$role->setName('Filip');

		$this->assertSame('Filip', $role->getName());
	}

	public function testSetMembers()
	{
		$role = new Role();

		$role->setMembers('Filip');

		$this->assertSame('Filip', $role->getMembers());
	}
}
