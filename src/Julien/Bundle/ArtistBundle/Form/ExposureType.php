<?php

namespace Julien\Bundle\ArtistBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExposureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('address')
            ->add('zip')
            ->add('city')
            ->add('country')
            ->add('picture')
            ->add('exponent')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Julien\Bundle\ArtistBundle\Entity\Exposure'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'julien_bundle_artistbundle_exposure';
    }
}
