<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use AppBundle\Form\RegisterType;


class LoginController extends Controller
{
  /**
   * @Route("/login/sign-in")
   */
  public function signInAction() {
    return $this->render('login/sign-in.html.twig', array());
  }

  /**
   * @Route("/login/sign-up")
   */
  public function signUpAction(Request $request) {
    $form = $this->createForm(RegisterType::class);
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      return $this->redirect('/');
    }

    return $this->render('login/sign-up.html.twig', array(
      'form' => $form->createView()
    ));
  }

  /**
   * @Route("/login/authenticate")
   */
  public function authenticateAction() {

  }

  /**
   * @Route("/login/register")
   */
  public function registerAction(Request $request) {
    $form = $this->createFormBuilder()
      ->add('username', TextType::class)
      ->add('password', PasswordType::class)
      ->add('password-confirm', PasswordType::class)
      ->getForm();

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
      $data = $form->getData();
      $data = $data;
    }

    return $this->render('login/sign-up.html.twig', array());
  }
}
