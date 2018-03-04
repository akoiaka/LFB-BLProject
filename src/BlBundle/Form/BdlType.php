<?php

namespace BlBundle\Form;

use Symfony\Component\Form\AbstractType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use BlBundle\BlBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BlBundle\Entity\Bonslivraison;
use BlBundle\Entity\Bdl;
use BlBundle\Entity\Clients;
use BlBundle\Form\ClientsType;
use BlBundle\Repository\ClientsRepository;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\Collection;
use BlBundle\Form\BonslivraisonType;
use Symfony\Component\Form\Form;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormView;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use BlBundle\Repository\BonslivraisonRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BdlType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('dateBdl',            DateType::class, array(
              'format' => 'dd-MM-yyyy',
              'label' => 'DATE',))
        ->add('clientBdl',          EntityType::class, array(
              'class'   => 'BlBundle:Clients',
              'choice_label'    => 'nomClient',
              'multiple' => false,
              ))
        ->add('article1',           EntityType::class, array(
              'class'   => 'BlBundle:Articles',
              'choice_label'    => 'libelleArt',
              'multiple' => false,
              ))
        ->add('article2',            EntityType::class, array(
              'class'   => 'BlBundle:Articles',
              'choice_label'    => 'libelleArt',
              'multiple' => false,
              ))
        ->add('article3',            EntityType::class, array(
              'class'   => 'BlBundle:Articles',
              'choice_label'    => 'libelleArt',
              'multiple' => false,
              ))
        ->add('quantite1',          IntegerType::class)
        ->add('quantite2',          IntegerType::class)
        ->add('quantite3',          IntegerType::class)
        ->add('descriptionBdl',     TextareaType::class)
        ->add('transporteurBdl',    EntityType::class, array(
              'class'   => 'BlBundle:Transporteurs',
              'choice_label'    => 'transporteur',
              'multiple' => false,
              ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Bdl'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_bdl';
    }


}
