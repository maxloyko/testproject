<?php

namespace Loyko\MaxBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('LoykoMaxBundle:Default:index.html.twig', array('name' => $name));
    }
}
