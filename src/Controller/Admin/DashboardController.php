<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Content;
use App\Entity\Artwork;
use App\Entity\Filter;
use App\Entity\Contact;

class DashboardController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio Melchior Admin')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-user', User::class);

        yield MenuItem::section('Contenus');
        yield MenuItem::linkToCrud('Contenus', 'fa fa-file', Content::class);

        yield MenuItem::section('Les œuvres');
        yield MenuItem::linkToCrud('Les œuvres', 'fa fa-image', Artwork::class);
        yield MenuItem::linkToCrud('Les filtres', 'fa fa-filter', Filter::class);

        yield MenuItem::section('Contacts');
        yield MenuItem::linkToCrud('Demande de contacts', 'fa fa-envelope', Contact::class);
        
    }
}
