<?php

namespace App\Controller\Admin;

use App\Entity\TArtwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class TArtworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TArtwork::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            
            ImageField::new('main_image')
                ->setBasePath('/uploads/images') 
                ->setUploadDir('public/uploads/images')  
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            
            TextEditorField::new('description'),

            DateTimeField::new('date')
                ->hideOnForm()
                ->setFormTypeOption('disabled', true), 

            ImageField::new('image_1')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            ImageField::new('image_2')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            ImageField::new('image_3')
                ->setBasePath('/uploads/images')
                ->setUploadDir('public/uploads/images')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),

            AssociationField::new('filter')
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $artwork = new TArtwork();
        $artwork->setDate(new \DateTime()); 

        return $artwork;
    }
}
