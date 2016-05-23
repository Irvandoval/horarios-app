<?php

namespace Hora\HoraBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HoraBundle:Default:index.html.twig', array('name' => $name));
    }
}
