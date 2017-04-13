<?php


namespace CustomerBundle\Service;



class Speaker
{

	private $registry;


// on precise dans le constructeur que $registry doit etre une instance de NameRegistry
	public function __construct(NameRegistry $registry)
	{
		$this->registry = $registry;
	}

	public function sayMyName()
	{
		return $this->registry->getRandomName();
	}
}