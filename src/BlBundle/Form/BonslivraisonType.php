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
use BlBundle\Form\BdlType;
use BlBundle\Entity\Clients;
use BlBundle\Form\ClientsType;
use BlBundle\Entity\Category;
use BlBundle\Form\CategoryType;
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
use BlBundle\Repository\CategoryRepository;
use BlBundle\Repository\BonslivraisonRepository;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;



class BonslivraisonType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      // // Arbitrairement, on récupère toutes les catégories qui commencent par "D" (sinon je laisse vide %)
        $pattern = 'D%';

        $builder
          ->add('dateBl',            DateType::class, array(
                'format' => 'dd-MM-yyyy',
                'label' => 'DATE',))
          ->add('clientBl',          EntityType::class, array(
                'class'   => 'BlBundle:Clients',
                'choice_label'    => 'nomClient',
                'multiple' => false,
                ))
          ->add('societeBl',          EntityType::class, array(
                'class'   => 'BlBundle:Articles',
                'choice_label'    => 'libelleArt',
                'multiple' => false,
                ))
          ->add('quantiteBl',        IntegerType::class)
          ->add('descriptionBl',     TextareaType::class)
          ->add('transporteurBl',    EntityType::class, array(
                'class'   => 'BlBundle:Transporteurs',
                'choice_label'    => 'transporteur',
                'multiple' => false,
                ))

                ->add('ajouter', CollectionType::class, array(
              'entry_type'         => TextType::class,
              'allow_add'    => true,
              'allow_delete' => true,
            ))


          ->addEventlistener(
                FormEvents::PRE_SET_DATA, // 1er argument. PRE_SET_DATA est l event qui nous interesse ici
                function(FormEvent $event){
                  // on récupère notre objet Bonslivraison au déclenchement de cet event
                  $bons = $event->getData();

                  if (null === $bons)
                  {
                  return;
                    // on sort de la fonction sans rien faire, si $bons vaut null
                  }

                  // si le bon n'est pas créé ou s'il n existe pas en base
                  if(null === $bons->getId())
                  {
                    // // alors ajout du champ published
                    // $event->getForm()->add(
                    //   'published', CheckboxType::class, array('required' => false));
                    //
                    // return $this->render('BlBundle:Vues:bl.html.twig', array(
                    //     'form' => $form->createView())),
                  }
                  else
                  {
                    // $event->getForm()->remove('published');

                    return;
                  }
                }
            );
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BlBundle\Entity\Bonslivraison'
        ));
    }

}
