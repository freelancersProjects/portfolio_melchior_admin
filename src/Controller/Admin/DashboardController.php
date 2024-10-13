<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\TContent;
use App\Entity\TArtwork;
use App\Entity\TFilter;
use App\Entity\TContact;

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
        yield MenuItem::section('Users');
        yield MenuItem::linkToCrud('Users', 'fa fa-user', User::class);

        yield MenuItem::section('Contents');
        yield MenuItem::linkToCrud('Contents', 'fa fa-file', TContent::class);

        yield MenuItem::section('Artworks');
        yield MenuItem::linkToCrud('Artworks', 'fa fa-image', TArtwork::class);
        yield MenuItem::linkToCrud('Filters', 'fa fa-filter', TFilter::class);

        yield MenuItem::section('Contacts');
        yield MenuItem::linkToCrud('Contacts', 'fa fa-envelope', TContact::class);
        
    }
}
