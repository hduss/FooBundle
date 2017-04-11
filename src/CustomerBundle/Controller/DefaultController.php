<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerBundle:Default:index.html.twig');
    }

    public function createAction()
    {
    	return new response('Created !!');
    }

    public function detailAction($identifiant)
    {
    	return new response('Detail du client ' . $identifiant);
    }

    public function updateAction()
    {
    	return new response('Update Client !');
    }

    public function deleteAction()
    {
    	return new response('Deleted Client ! ');
    }
}
