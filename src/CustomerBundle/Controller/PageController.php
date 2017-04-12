<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

##  importer la librairie pour pouvoir utiliser la nouvelle syntaxe des formulaire > 2.8  ##
use Symfony\Component\Form\Extension\Core\Type;

class PageController extends Controller
{
    public function homeAction()
    {
        var_dump("titi");
        return $this->render('CustomerBundle::base.html.twig');
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

##  on met en parametre de la création du formulaire le tableau par default  ##
##  les add peuvent prendre jusqu'a 3 arguments --> nom, type et parametres sous forme de tableau associatif  ##
        $form = $this->createFormBuilder($data)
        ->add('email', 'email', ['label' => 'Adresse email'])
        ->add('subject')
        ->add('message', Type\TextareaType::class)
##  required copy sert a desactiver la validation obligatoire d'un champ  ##
        ->add('copy', Type\CheckboxType::class, ['required' => false])
        ->add('service', 'choice', [
                // Attention: Clé/Valeur inversées version < 2.7
                'choices' => [
                    'Service commercial'  => 1,
                    'Service facturation' => 2,
                    'Service technique'   => 3,
                ],
                'choices_as_values' => true, // (Requis < 3.0)

                'expanded'    => false, // False by default, Select => Radio

                'multiple'    => false, // False by default, Radio => Checkboxes

                'placeholder' => 'Choisissez un service',
            ])
        ->add('attachment', 'file')     
        ->add('send', Type\SubmitType::class)
        ->getForm();

        $form->handleRequest($request);
##  si le submit est cliqué et si le formulaire est rempli  (if(isset) && if(isset))  ##
        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();

##  sert a faire une redirection pour pas que l'user valide le formulaire 50 fois s'il rafraichi la page   ##

            //return $this->redirectToRoute('customer_contact');
        }

        return $this->render('CustomerBundle:Default:contact.html.twig',
            [
            'form' => $form->createView(),
            'data' => $data,
            ]);   
    }

}
