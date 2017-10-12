<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Person;
use AppBundle\Entity\Role;
use AppBundle\Form\PasswordWithConfirmType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\RegisterType;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // New user
        $user = new Person();
        $form = $this->createForm(RegisterType::class, $user)
            ->add('submit', SubmitType::class, array('label' => 'Go!'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $encoder = $this->get('security.password_encoder');
            $encoded_password = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($encoded_password);

            // User roles
            $doctrine = $this->getDoctrine();
            $basic_role = $doctrine->getRepository(Role::class)
                ->find(Role::USER_BASIC);
            $user->setRoles([$basic_role]); // при регистрации юзер всегда базовый

            // Save new user
            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect('/');
        }

        return $this->render('registration/register.html.twig', array(
            'form' => $form->createView()
        ));
    }
}