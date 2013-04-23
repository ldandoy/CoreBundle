<?php

namespace StartPack\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConfigType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder->add('slug')->add('value')->add('label');
	}

	public function setDefaultOptions(OptionsResolverInterface $resolver) {
		$resolver->setDefaults(array('data_class' => 'StartPack\CoreBundle\Entity\Config'));
	}

	public function getName() {
		return 'startpack_corebundle_configtype';
	}
}
