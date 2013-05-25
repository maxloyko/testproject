<?php
namespace Loyko\MaxBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

use Knp\Menu\ItemInterface as MenuItemInterface;
/**
 * Description of FilmAdmin
 *
 * @author maxloyko
 */
class FilmAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('description', 'textarea', array('required' => false))
            ->add('quality', 'choice', array(
                        'label' => 'Quality',
                        'choices' => array('dvdrip' => 'dvdrip', 'hdrip' => 'hdrip', '720p' => '720p', '1080p' => '1080p', 'dvd5' => 'dvd5'),
                    ))
            ->add('actors', 'sonata_type_model', 
                        array(
                                'label' => 'Actors',
                                'multiple' => true,
                                'expanded' => true,
                                'required' => false,
                                ))
            ->add('tags', 'sonata_type_model', 
                        array(
                                'label' => 'Tags',
                                'multiple' => true,
                                'expanded' => true,
                                'required' => false,
                                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
        ;
    }
}