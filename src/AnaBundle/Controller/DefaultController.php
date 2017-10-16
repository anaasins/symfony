<?php

namespace AnaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('AnaBundle:Default:index.html.twig');
    }

    /**
     * @Route("/nombre", name="paco_nombre")
     */
    public function nombreAction()
    {
        return $this->render('AnaBundle:Default:nombre.html.twig');
    }

    /**
     * @Route("/sede/{ciudad}", name="sede_prueba")
     */
    public function sedeAction($ciudad="VLC")
    {
        return $this->render('AnaBundle:Default:sede.html.twig', array('c'=>$ciudad));
    }
}
