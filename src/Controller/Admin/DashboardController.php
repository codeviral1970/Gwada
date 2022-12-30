<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use App\Entity\User;
use App\Entity\About;
use App\Entity\Formule;
use App\Entity\Services;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_gwada_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Gwada Excursion')
            ->renderContentMaximized()
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-bar-chart');

        yield MenuItem::subMenu('Website', 'fas fa-bar')
            ->setSubItems([
            MenuItem::linkToCrud('Accueil', 'fas fa-home', Home::class),
            MenuItem::linkToCrud('A propos', 'fas fa-user', About::class),
            MenuItem::linkToCrud('Activités', 'fas fa-list', Services::class),
            MenuItem::linkToCrud('Formule', 'fas fa-file', Formule::class),
        ]);

        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
    }
}
