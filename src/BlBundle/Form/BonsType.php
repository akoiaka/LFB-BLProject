<?php

namespace BlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BonsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Bons'
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      ->add('dateBl',            DateTimeType::class)
//            Le typeDateType que l'on a utilisé affiche 3 champs select
//            Il existe aussi un type TimezoneType pour choisir le fuseau horaire
      ->add('numeroBl',          TextType::class)
      ->add('clientBl',          TextType::class)
      ->add('societeBl',         TextType::class)
      ->add('quantiteBl',        TextType::class)
      ->add('descriptionBl',     TextareaType::class)
      ->add('transporteurBl',    TextType::class)
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_bons';
    }
//

}
