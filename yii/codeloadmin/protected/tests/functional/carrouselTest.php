<?php

class carrouselTest extends WebTestCase
{
	public $fixtures=array(
		'carrousels'=>'carrousel',
	);

	public function testShow()
	{
		$this->open('?r=carrousel/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=carrousel/create');
	}

	public function testUpdate()
	{
		$this->open('?r=carrousel/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=carrousel/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=carrousel/index');
	}

	public function testAdmin()
	{
		$this->open('?r=carrousel/admin');
	}
}
