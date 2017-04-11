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
        return $this->render('CustomerBundle:Default:contact.html.twig');   
    }

}
