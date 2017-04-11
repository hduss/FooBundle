<?php

namespace CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('CustomerBundle::base.html.twig');
    }

    public function createAction()
    {

    	return $this->render('CustomerBundle:Default:create.html.twig');
    }

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
