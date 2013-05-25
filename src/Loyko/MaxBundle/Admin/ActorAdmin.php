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
 * Description of ActorAdmin
 *
 * @author maxloyko
 */
class ActorAdmin extends Admin
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

    public function validate(ErrorElement $errorElement, $current_actor)
    {
        
        $same_name_actor = $this->getModelManager()
            ->getEntityManager('LoykoMaxBundle:Actor')
            ->getRepository('LoykoMaxBundle:Actor')
            ->findOneByName($current_actor->getName());

        if ($same_name_actor && $current_actor !== $same_name_actor) {
            $errorElement->with('name')->addViolation('Name already in use. (Actor "'.$same_name_actor->getName().'", id='.$same_name_actor->getId().')')->end();
        }
    }
}