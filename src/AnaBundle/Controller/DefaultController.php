<?php

namespace AnaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AnaBundle\Entity\alumnos;
use AnaBundle\Form\alumnosType;
use Symfony\Component\HttpFoundation\Request;

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
    /**
     * @Route("/list", name="list")
     */
    public function listAction()
    {
      //devolver la clase para interactuar con la BBDD
        $repository = $this->getDoctrine()->getRepository(alumnos::class);
      //sacar lo que queramos de la base de datos
        $alumnos = $repository->findAll();


        return $this->render('AnaBundle:Default:list.html.twig', array('alumnos'=>$alumnos));
    }

    /**
     * @Route("/insert/{nombre}/{apellidos}/{edad}", name="insert")
     */
    public function insertarAction($nombre, $apellidos='sin apellidos', $edad=20, $fecha='20-10-2017')
    {
      $em = $this->getDoctrine()->getManager();

      $alumnos  = new alumnos();
      $alumnos->setNombre($nombre);
      $alumnos->setApellidos($apellidos);
      $alumnos->setEdad($edad);
      $alumnos->setFechaCreacion(new \DateTime($fecha));

      $em->persist($alumnos);

      $em->flush();

      return $this->redirectToRoute('list');
    }

    /**
     * @Route("/nuevoAlumno", name="nuevoAlumno")
     */
     public function nuevoAlumnoAction(Request $request)
     {
       $alumnos = new alumnos();
       $form = $this->createForm(alumnosType::class, $alumnos);

       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
        $alumno = $form->getData();
         $em = $this->getDoctrine()->getManager();
         $em->persist($alumno);
         $em->flush();

        return $this->redirectToRoute('list');
    }

       return $this->render('AnaBundle:Default:nuevoAlumno.html.twig', array('form'=>$form->createView()));
     }
}
