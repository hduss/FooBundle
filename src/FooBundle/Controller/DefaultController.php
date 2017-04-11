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

##  $test_param correspond a la variable de l'URL dans routing.yml  ##
    public function testParamAction($test_param)
    {
    	return new response("Test Param : " . $test_param);
    }


    public function numberAction($number)
    {
    	return new response("Number --> " . $number);
    }
}
