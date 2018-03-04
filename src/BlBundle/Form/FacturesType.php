<?php

namespace BlBundle\Form;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormView;
use BlBundle\BlBundle;
use BlBundle\Entity\Factures;
use BlBundle\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use BlBundle\Form\CategoryType;
use BlBundle\Form\BonslivraisonType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use BlBundle\Repository\CategoryRepository;
use BlBundle\Repository\FacturesRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;




class FacturesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // $pattern = 'F%';

        $builder
            ->add('dateFacture',            DateType::class, array(
                  'widget' => 'single_text',
                  'format' => 'dd-MM-yyyy',
                  'label' => 'DATE',
                  ))
            ->add('reference',          EntityType::class, array(
                  'class'   => 'BlBundle:Clients',
                  'choice_label'    => 'nomClient',
                  'multiple' => false,
                  ))
            ->add('designation',          EntityType::class, array(
                  'class'   => 'BlBundle:Articles',
                  'choice_label'    => 'libelleArt',
                  'multiple' => false,
                  ))
            ->add('quantite',        IntegerType::class)
            ->add('puHt',            IntegerType::class)

         //
        //   ->add('categories', EntityType::class, array(
        //         'class'   => 'BlBundle:Factures',
        //         'choice_label'    => 'numeroFacture',
        //         'multiple' => false,
        //         'query_builder' => function($repository) use($pattern){
        //           $pattern = '%';
        //  return $repository->getLikeQueryBuilder($pattern);
        //           }
        //       ));


        ->addEventlistener(
              FormEvents::PRE_SET_DATA,
              function(FormEvent $event){
                $fact = $event->getData();

                if (null === $fact)
                {
                return;
                }

                if(null === $fact->getId())
                {

                }
                else
                {
                  return;
                }
              }
          );}


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'blbundle_factures';
    }

    public function getName()
    {
        return 'blbundle_facturestype';
    }

}
