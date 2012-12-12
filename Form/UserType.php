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
            ->add('email')
            ->add('password','text',
                Array(
                    'label' => 'Mot de passe',
                    'required' => false
                )
            )
            ->add('userInfo' , new UserInfoType())
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
