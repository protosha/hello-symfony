<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Form\LoginType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use AppBundle\Form\RegisterType;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class AuthenticationController extends Controller
{
    /**
     * @Route("/authenticate", name="authenticate")
     */
    public function authenticateAction(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $email = $authUtils->getLastUsername();
        return $this->render('authentication/sign-in.html.twig', array(
            'last_username' => $email,
            'error' => $error
        ));
    }
}
