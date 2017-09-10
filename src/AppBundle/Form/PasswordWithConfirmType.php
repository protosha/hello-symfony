<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class PasswordWithConfirmType extends AbstractType {
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('password', PasswordType::class, array('label' => false))
      ->add('password-confirm', PasswordType::class, array('label' => false));
  }
}