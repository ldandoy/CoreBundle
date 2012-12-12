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
            ->add('lastName','text',
                Array('label' => 'Prénom')
            )
            ->add('firstName','text',
                Array('label' => 'Nom')
            )
            ->add('address','textarea',
                Array('label' => 'Adresse')
            )
            ->add('cp','text',
                Array('label' => 'Code Postal')
            )
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
