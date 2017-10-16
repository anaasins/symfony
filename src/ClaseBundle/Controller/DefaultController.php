<?php

namespace ClaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ClaseBundle:Default:index.html.twig');
    }

    public function sedeAction($ciudad)
    {
        return $this->render('ClaseBundle:Default:sede.html.twig', array('ciudad'=>$ciudad));
    }

}
