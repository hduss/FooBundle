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


    public function contactAction()
    {

        $form = $this->createFormBuilder()
        ->add('email')
        ->add('subject')
        ->add('message', 'textarea')
        ->add('copy', 'checkbox')
        ->add('send', 'submit')
        ->getForm();


        return $this->render('CustomerBundle:Default:contact.html.twig',
            [
            'form' => $form->createView(),
            ]);   
    }

}
