<?php

namespace FooBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FooBundle:Default:index.html.twig');
    }


    public function fooAction()
    {
    	return new response('FOO!!');
    }


    public function barAction()
    {
    	return new response('BAR!!!');
    }
}
