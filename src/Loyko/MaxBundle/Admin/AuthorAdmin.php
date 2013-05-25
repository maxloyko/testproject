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
 * Description of AuthorAdmin
 *
 * @author maxloyko
 */
class AuthorAdmin extends Admin
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
    public function validate(ErrorElement $errorElement, $current_author)
    {
        
        $same_name_author = $this->getModelManager()
            ->getEntityManager('LoykoMaxBundle:Author')
            ->getRepository('LoykoMaxBundle:Author')
            ->findOneByName($current_author->getName());

        if ($same_name_author && $current_author !== $same_name_author) {
            $errorElement->with('name')->addViolation('Name already in use. (Actor "'.$same_name_author->getName().'", id='.$same_name_author->getId().')')->end();
        }
    }
}