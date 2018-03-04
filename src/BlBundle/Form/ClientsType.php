<?php

namespace BlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClientsType extends AbstractType
{
  /**
   * @ORM\ManyToMany(targetEntity="BlBundle\Entity\Clients", cascade={"persist"})
   */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('codeClient')->add('nomClient')->add('siret')->add('adresse1')->add('adresse2')->add('adresse3')->add('codePostal')->add('ville')->add('pays')->add('adresse1Livraison')->add('adresse2Livraison')->add('adresse3Livraison')->add('paysLivraison')->add('telephone')->add('portable')->add('fax')->add('compteComptable')->add('codeIso')->add('codeCEE')->add('numeroIso')->add('codeInsee')->add('contactClient');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Clients'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_clients';
    }


}
