<?php
/**
 * Created by PhpStorm.
 * User: jlopez
 * Date: 12/5/17
 * Time: 10:48 AM
 */

namespace Yoda\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterFormType extends AbstractType
{
    // This is where we build our form
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add( 'username', 'text' )
                ->add( 'email', 'email' )
                ->add( 'plainPassword', 'repeated', array(
                        'type' => 'password'
            ) );

    }

    public function configureOptions(OptionsResolver $resolver)
    {

        $resolver->setDefaults( array(

            'data_class' => 'Yoda\UserBundle\Entity\User'

        ) );

    }

    public function finishView(FormView $view, FormInterface $form, array $options)
    {
        $view['email']->vars['help'] = "It will have an @ symbol.";
    }


    public function getName()
    {

        return 'user_register';

    }
}