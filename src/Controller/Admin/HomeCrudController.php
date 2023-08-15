<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HomeCrudController extends AbstractCrudController
{
  public static function getEntityFqcn(): string
  {
    return Home::class;
  }

  public function configureFields(string $pageName): iterable
  {
    return [
      IdField::new('id')->onlyOnIndex()->hideOnIndex(),
      TextField::new('title'),
      TextField::new('titleOne', 'Titre un'),
      TextField::new('titleThree', 'Titre trois (ici c\'est le mot avec'),
      TextField::new('titleTwo', 'Titre deux'),
      TextField::new('imageName', 'Nom image'),
      NumberField::new('imageSize')->hideOnForm(),
      TextField::new('imageFile', 'Bg image')
        ->setFormType(VichImageType::class)
        ->hideOnIndex(),
      ImageField::new('bgImg', 'Image de fond')->setBasePath('images/home')->onlyOnIndex(),
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
      ->setEntityLabelInPlural('Accueil')
      ->setEntityLabelInSingular('Accueil');
  }
}
