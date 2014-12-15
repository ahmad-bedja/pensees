<?php

namespace Abba\PenseesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CitationType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('auteur','entity', array(
                'class' => 'AbbaPenseesBundle:Auteur',
                'property' => 'nom',
                'label' => 'Auteur',
                'expanded' => false,
                'multiple' => false )
            )
            ->add('contenu', 'textarea')
            ->add('ajouter', 'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Abba\PenseesBundle\Entity\Citation'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'abba_penseesbundle_citation';
    }
}
