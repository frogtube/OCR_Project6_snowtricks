<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class TrickController extends Controller
{
    /**
     * @Route("/")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $tricks = $em->getRepository('AppBundle:Trick')
            ->findAll();


        return $this->render('trick/list.html.twig', array(
            'title' => 'Snowtricks',
            'tricks' => $tricks,
        ));
    }

    /**
     * @Route("/trick/{trickName}")
     * @param $trickName
     */
    public function showAction($trickName)
    {
        $comments = array(
            'comment 1',
            'comment 2',
            'comment 3',
        );

        return $this->render('trick/show.html.twig', array(
            'name' => $trickName,
            'comments' => $comments,
        ));

    }
}
