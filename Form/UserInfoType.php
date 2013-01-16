<?php

namespace StartPack\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserInfoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastName','text', Array(
            	'label' => 'Nom',
            	'required' => true
			))
            ->add('firstName','text', Array(
            	'label' => 'Prénom',
            	'required' => true
			))
            ->add('address','textarea', Array(
            	'label' => 'Adresse',
            	'required' => false
			))
            ->add('cp','text', Array(
            	'label' => 'Code Postal',
            	'required' => false
			))
            ->add('ville', 'text', Array(
            	'label' => 'Code Postal',
            	'required' => false
			))
            ->add('optin','checkbox',Array(
                'label' => 'Newsletter',
                'required' => false
            ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'StartPack\CoreBundle\Entity\UserInfo'
        ));
    }

    public function getName()
    {
        return 'startpack_corebundle_userinfotype';
    }
}
