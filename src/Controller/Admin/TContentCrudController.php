<?php

namespace App\Controller\Admin;

use App\Entity\TContent;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Vich\UploaderBundle\Form\Type\VichFileType;

class TContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TContent::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('main_name'),
            TextField::new('title_bio'),
            TextEditorField::new('description_bio'),
            TextField::new('image_bio_file')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex(),

            TextField::new('video_file')
                ->setFormType(VichFileType::class) // Utiliser VichFileType pour les vidéos
                ->setFormTypeOptions([
                    'allow_delete' => false,
                    'download_uri' => true,
                    'download_label' => 'Télécharger la vidéo',
                ])
                ->hideOnIndex(),
            TextField::new('title_artwork'),

        ];
    }
}
