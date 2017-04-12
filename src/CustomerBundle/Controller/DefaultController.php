<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CustomerBundle\Entity\Customer;
use CustomerBundle\Form\CustomerType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$repo = $this->getDoctrine()->getRepository('CustomerBundle:Customer');

    	$customers = $repo->findAll();

		var_dump("toto");

        return $this->render('CustomerBundle::base.html.twig',
        	[
        	'customers' => $customers]);
    }


## CRÉATION D'ENTITÉ GRACE A UNE FORMULAIRE  ##

	public function createAction(Request $request)
    {
        $customer = new Customer();

        $form = $this
        	->createForm(new CustomerType(), $customer)
        	->add('submit', 'submit');

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

            return $this->redirectToRoute('customer_homepage');
        }
        
        return $this->render('CustomerBundle:Default:create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


## ----------------------------------------------------------  ##





    public function detailAction($identifiant)
    {

    	return $this->render('CustomerBundle:Default:detail.html.twig',
    	 [
    	 'id' => $identifiant,
    	 ]);
    }

    public function updateAction($identifiant)
    {

    	return $this->render('CustomerBundle:Default:update.html.twig',
    	 [
    	 'identifiant' => $identifiant,
    	 ]);
    }

    public function deleteAction($identifiant)
    {

    	return $this->render('CustomerBundle:Default:delete.html.twig',
    	 [
    	 'identifiant' => $identifiant,
    	 ]);
    }




}
