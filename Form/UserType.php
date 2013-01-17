<?php

namespace StartPack\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'text', Array(
				'label' => 'Email',
				'required' => true
			))
            ->add('password','repeated', Array(
            	'type' => 'password',
            	'first_options'  => array('label' => 'Password'),
    			'second_options' => array('label' => 'Repeat Password'),
                'required' => true
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StartPack\CoreBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'startpack_corebundle_usertype';
    }
}
