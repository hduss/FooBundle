<?php

namespace CustomerBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class AddressType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{

##  les noms doivent correspondre aux noms des attribus de l'entitée customer  ##
		$builder
			->add('street')
			->add('postalCode')
			->add('city');

	}

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults(
		[
			'data_class' => 'CustomerBundle\Entity\Address',
		]);
	}

}