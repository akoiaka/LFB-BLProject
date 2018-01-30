<?php

namespace BlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use BlBundle\Entity\Bonslivraison;

class BonslivraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateBl')
            ->add('numeroBl')
            ->add('descriptionBl', 'textarea', array(
                'required' => false,
            ))
            ->add('clientBl')
            ->add('societeBl')
            ->add('transporteurBl')
            ->add('quantiteBl');
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Bonslivraison'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_bonslivraison';
    }

    public function getName()
    {
        return 'blbundle_bonslivraisontype';
    }


}
