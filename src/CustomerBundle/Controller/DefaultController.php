<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use CustomerBundle\Entity\Customer;
use CustomerBundle\Form\CustomerType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\IsTrue;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$repo = $this->getDoctrine()->getRepository('CustomerBundle:Customer');

    	$customers = $repo->findAll();

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
// on recupere le repo sur la classe customer
    	$repo = $this
    		->getDoctrine()
    		->getRepository('CustomerBundle:Customer');


//on recupere l'entitée par son identifiant
    	$customer = $repo->find($identifiant);


// puis on affiche le template detail.html.twig avec comme parametre le customer pour pouvoir afficher ses valeurs
    	return $this->render('CustomerBundle:Default:detail.html.twig',
    	 [
    	 'customer' => $customer,
    	 ]);
    }


## ----------------------------------------------------------


    public function updateAction(Request $request)
    {

// on recupere l'identifiant du customer grace a request->attributes->get('identifiant')
    	$identifiant = $request->attributes->get('identifiant');

// on initialise le repo
    	$repo = $this
    		->getDoctrine()
    		->getRepository('CustomerBundle:Customer');


// on recupere l'entité par rapport a son id recupéré precedement
    	$customer = $repo->find($identifiant);


// on crée un formulaire qui recupere les valeurs de l'entitée
        $form = $this
        	->createForm(new CustomerType(), $customer)
        	->add('submit', 'submit');

        $form->handleRequest($request);


// si le formulaire et valide et soumis
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();

// on redirige vers la homepage
            return $this->redirectToRoute('customer_homepage');
        }


// ici ce sera la page sur laquelle on atterit avant la soumission du formulaire
        return $this->render('CustomerBundle:Default:update.html.twig', [
            'form' => $form->createView(),
            'customer' => $customer,
        ]);
    }


## ----------------------------------------------------------

    public function deleteAction(Request $request)
    {

    	$identifiant = $request->attributes->get('identifiant');

        $repository = $this
            ->getDoctrine()
            ->getRepository('CustomerBundle:Customer');

        $customer = $repository->find($identifiant);

        if (null == $customer) {

            throw $this->createNotFoundException(
                'Command not found'
                
            );
        }

        $data =[

        ];  

        $form = $this->createFormBuilder()
        	->add('confirm', 'checkbox', [
        		'label' => 'Confirmer la supression',
        		'required' => false,
        		'constraints' => [
        			new isTrue()]
        		])

        	->add('submit', 'submit')
        	->getForm();

        $form->handleRequest($request);


        // 3. Si la case est cochée, supprimer le client
        //Et rediriger vers la liste

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($customer);
            $em->flush();

            $this->redirectToRoute('customer_homepage');
        }

        return $this->render('CustomerBundle:Default:delete.html.twig', [
            'form' => $form->createView(),
        ]);



    }



## ----------------------------------------------------------





}
