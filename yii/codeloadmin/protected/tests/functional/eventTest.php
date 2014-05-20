<?php

class eventTest extends WebTestCase
{
	public $fixtures=array(
		'events'=>'event',
	);

	public function testShow()
	{
		$this->open('?r=event/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=event/create');
	}

	public function testUpdate()
	{
		$this->open('?r=event/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=event/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=event/index');
	}

	public function testAdmin()
	{
		$this->open('?r=event/admin');
	}
}
