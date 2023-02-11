<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use ConnectHolland\CookieConsentBundle\Entity\CookieConsentLog;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;

class CookieConsentLogCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return CookieConsentLog::class;
  }


  public function configureFields(string $pageName): iterable
  {
    return [
      IdField::new('id')->hideOnIndex()->hideOnForm(),
      TextField::new('ipAddress', 'Adresse Ip'),
      TextField::new('cookieName', 'Nom du cookie'),
      TextField::new('cookieName', 'Nom du cookie'),
      TextField::new('cookieName', 'Nom du cookie'),
      DateField::new('timestamp', 'Date'),

    ];
  }

  public function configureActions(Actions $actions): Actions
  {
    return $actions->add(Crud::PAGE_INDEX, Action::DETAIL);
  }

  public function configureCrud(Crud $crud): Crud
  {
    return $crud
      ->setEntityLabelInPlural('Cookies')
      ->setEntityLabelInSingular('Cookie');
  }
}
