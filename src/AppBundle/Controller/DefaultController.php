<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="zaproponujroute")
     */
    public function zaproponujAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/zaproponuj.html.twig', []);
    }
}
