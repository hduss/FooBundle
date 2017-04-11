<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerBundle:base.html.twig');
    }

    public function createAction()
    {
    	//return new response('Created !!');
    	return $this->render('CustomerBundle:Default:create.html.twig');
    }

    public function detailAction($identifiant)
    {
    	//return new response('Detail du client ' . $identifiant);
    	return $this->render('CustomerBundle:Default:detail.html.twig', ['']);
    }

    public function updateAction($identifiant)
    {
    	//return new response('Update du Client ' . $identifiant);
    	return $this->render('CustomerBundle:Default:update.html.twig');
    }

    public function deleteAction($identifiant)
    {
    	//return new response('Supression du Client ' . $identifiant);
    	return $this->render('CustomerBundle:Default:delete.html.twig');
    }
}
