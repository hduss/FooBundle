<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function homeAction()
    {
        return $this->render('CustomerBundle::baseContact.html.twig');
    }


    public function contactAction(Request $request)
    {


## on est obligé de creer une variable pour les valeurs par default du formulaire  ##
        $data =[
            'email' => null,
            'subject' => null,
            'message' => null,
            'copy' => null,
            'send' => null,
        ];

## on met en parametre de la création du formulaire le tableau par default  ##
        $form = $this->createFormBuilder($data)
        ->add('email')
        ->add('subject')
        ->add('message', 'textarea')
        ->add('copy', 'checkbox')
        ->add('send', 'submit')
        ->getForm();

        $form->handleRequest($request);
##  si le submit est cliqué et si le formulaire est rempli  (if(isset) && if(isset))  ##
        if ($form->isSubmited() && $form->isValid()) {

            $data = $form->getData();

##  sert a faire une redirection pour pas que l'user valide le formulaire 50 fois s'il rafraichi la page   ##
            return $this->redirectToRoute();
        }

        return $this->render('CustomerBundle:Default:contact.html.twig',
            [
            'form' => $form->createView(),
            ]);   
    }

}
