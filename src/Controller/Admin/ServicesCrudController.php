<?php

namespace App\Controller\Admin;

use App\Entity\Services;
use App\Form\SlideType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ServicesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Services::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm()
                ->hideOnIndex(),
            TextField::new('name', 'Titre'),
            SlugField::new('slug', 'slug')
                ->setTargetFieldName('name')
                ->onlyOnForms(),
            TextEditorField::new('description'),
            CollectionField::new('slides', 'Image')
                ->setEntryType(SlideType::class),
            ImageField::new('avatar')
                ->setBasePath('images/services')
                ->onlyOnIndex(),
            TextField::new('imageName', 'Nom image'),
            TextEditorField::new('goodToKnow', 'Bon à savoir')->hideOnIndex(),
            TextEditorField::new('courseOfTheDay', 'Déroulement journée')->hideOnIndex(),
            TextEditorField::new('menu', 'Menu'),
            BooleanField::new('isBest'),
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
            ->setEntityLabelInPlural('Activités')
            ->setEntityLabelInSingular('Activité')
            ->setDefaultSort(['name' => 'ASC']);
    }
}
