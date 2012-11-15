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
            ->add('lastName')
            ->add('firstName')
            ->add('address')
            ->add('cp')
            ->add('ville')
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
