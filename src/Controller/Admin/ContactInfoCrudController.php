<?php

namespace App\Controller\Admin;

use App\Entity\ContactInfo;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ContactInfoCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return ContactInfo::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      IdField::new('id')->hideOnForm()->hideOnIndex(),
      TextField::new('title'),
      TextEditorField::new('description'),
    ];
  }

  public function configureActions(Actions $actions): Actions
  {
    return $actions
      ->add(Crud::PAGE_INDEX, Action::DETAIL);
  }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setEntityLabelInPlural('Contacts')
      ->setEntityLabelInSingular('Contact');
  }
}
