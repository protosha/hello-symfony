<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use AppBundle\Form\RegisterType;


class AuthenticationController extends Controller
{
    /**
     * @Route("/sign-in")
     */
    public function signInAction()
    {
        return $this->render('authentication/sign-in.html.twig', array());
    }

    /**
     * @Route("/authenticate")
     */
    public function authenticateAction()
    {

    }
}
