<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RegisterType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options) {
    $builder
      ->add('username', TextType::class, array('label' => 'Username'))
      ->add('password', PasswordWithConfirmType::class, array('label' => 'Password'))
      ->add('submit', SubmitType::class, array('label' => 'Submit'));
  }
}