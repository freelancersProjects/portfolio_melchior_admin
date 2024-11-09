<?php

namespace App\Controller\Admin;

use App\Entity\Artwork;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArtworkCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Artwork::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title', 'Titre de l\'oeuvre')
                ->setRequired(true),

            TextField::new('audio_artwork_file', 'Audio de l\'oeuvre')
                ->setFormType(VichFileType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'asset_helper' => true])
                ->hideOnIndex(),

            TextField::new('main_image_file', 'Image principale')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions([
                    'allow_delete' => false, 
                    'download_uri' => false, 
                    'image_uri' => true, 
                    'asset_helper' => true,
                ])
                ->hideOnIndex(),

            AssociationField::new('filter', 'Filtre')
                ->setRequired(true),

            TextEditorField::new('description', 'Description de l\'oeuvre')
                ->setRequired(true),

            DateTimeField::new('date')
                ->hideOnForm()
                ->setFormTypeOption('disabled', true),

            TextField::new('image_1_file', 'Image 1')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex(),

            TextField::new('image_2_file', 'Image 2')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex(),

            TextField::new('image_3_file', 'Image 3')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex(),
        ];
    }

    public function createEntity(string $entityFqcn)
    {
        $artwork = new Artwork();
        $artwork->setDate(new \DateTime());

        
        return $artwork;
    }
}
