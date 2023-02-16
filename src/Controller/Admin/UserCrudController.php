<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UserCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return User::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      IdField::new('id')->hideOnForm()->hideOnIndex(),
      TextField::new('email'),
      TextField::new('password'),
    ];
  }

  public function configureActions(Actions $actions): Actions
  {
    return $actions
      // ->disable(Crud::PAGE_EDIT, Action::DELETE)
      ->add(Crud::PAGE_INDEX, Action::DETAIL);
  }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setEntityLabelInPlural('Utilisateurs')
      ->setEntityLabelInSingular('Utilisateur');
  }
}
