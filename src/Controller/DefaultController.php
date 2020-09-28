<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/")
 *
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    public function home()
    {
        dump("test"); die;
        return $this->render('base.html.twig', []);
    }
}