<?php

namespace App\Controller\Admin;

use App\Entity\Content;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ContentCrudController extends AbstractCrudController
{
    private AdminUrlGenerator $adminUrlGenerator;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, AdminUrlGenerator $adminUrlGenerator)
    {
        $this->entityManager = $entityManager;
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string
    {
        return Content::class;
    }

    #[Route('/admin/content_redirect', name: 'admin_content_redirect')]
    public function redirectToContentForm(): Response
    {
        $content = $this->entityManager->getRepository(Content::class)->findOneBy([]);

        if (!$content) {
            $content = new Content();
            $this->entityManager->persist($content);
            $this->entityManager->flush();
        }

        $url = $this->adminUrlGenerator
            ->setController(self::class)
            ->setAction('edit')
            ->setEntityId($content->getId())
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('main_name', 'Nom principal')
                ->setRequired(true),
            TextField::new('title_bio', 'Titre de la biographie')
                ->setRequired(true),
            TextEditorField::new('description_bio', 'Description de la biographie')
                ->setRequired(true),
            TextField::new('image_bio_file', 'Image de la biographie')
                ->setFormType(VichImageType::class)
                ->setFormTypeOptions(['allow_delete' => false, 'download_uri' => false, 'image_uri' => true, 'asset_helper' => true])
                ->hideOnIndex(),
            TextField::new('video_bio', 'Vidéo de la biographie')
                ->setRequired(true),
            TextField::new('title_artwork', 'Titre de l\'oeuvre')
                ->setRequired(true),
        ];
    }
}
