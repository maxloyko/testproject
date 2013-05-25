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
 * Description of TagAdmin
 *
 * @author maxloyko
 */
class TagAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
        ;
    }
        public function validate(ErrorElement $errorElement, $current_tag)
    {
        
        $same_name_tag = $this->getModelManager()
            ->getEntityManager('LoykoMaxBundle:Tag')
            ->getRepository('LoykoMaxBundle:Tag')
            ->findOneByName($current_tag->getName());

        if ($same_name_tag && $current_tag !== $same_name_tag) {
            $errorElement->with('name')->addViolation('Name already in use. (Tag "'.$same_name_tag->getName().'", id='.$same_name_tag->getId().')')->end();
        }
    }
}