<?php

namespace App\Controller\Admin;

use App\Entity\Home;
use App\Entity\User;
use App\Entity\About;
use App\Entity\Slide;
use App\Entity\Formule;
use App\Entity\Services;
use App\Entity\ContactInfo;
use Vich\UploaderBundle\Entity\File;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use ConnectHolland\CookieConsentBundle\Entity\CookieConsentLog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
  #[IsGranted('ROLE_ADMIN')]
  #[Route('/admin', name: 'app_gwada_admin')]
  public function index(): Response
  {
    return $this->render('admin/index.html.twig');
  }

  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('Gwada Excursion')
      ->renderContentMaximized();
  }

  public function configureMenuItems(): iterable
  {
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-bar-chart');

    yield MenuItem::subMenu('Website', 'fas fa-bar')
      ->setSubItems([
        MenuItem::linkToCrud('Accueil', 'fas fa-home', Home::class),
        MenuItem::linkToCrud('A propos', 'fas fa-user', About::class),
        MenuItem::linkToCrud('Activités', 'fas fa-list', Services::class),
        MenuItem::linkToCrud('Image', 'fas fa-image', Slide::class),
        MenuItem::linkToCrud('Formule', 'fas fa-file', Formule::class),
        MenuItem::linkToCrud('Contact', 'fas fa-users', ContactInfo::class),
      ]);

    yield MenuItem::linkToCrud('Utilisateur', 'fas fa-user', User::class);
    yield MenuItem::linkToCrud('Cookie', 'fas fa-cookie', CookieConsentLog::class);
    yield MenuItem::linkToUrl('Gwada site', 'fas fa-home', $this->generateUrl('app_home'));
  }
}
