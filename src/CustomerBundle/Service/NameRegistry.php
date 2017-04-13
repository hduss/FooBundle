<?php


namespace CustomerBundle\Service;



class NameRegistry
{

	private $names;

	public function __construct()
	{
		$this->names = [
			'francis',
			'francois',
			'francine',
			'fragile',
			'fragment',
			'fricassé',
			'froid',
		];
	}



	public function getRandomName()
    {
        return $this->names[rand(0, count($this->names) - 1)];
    }
}