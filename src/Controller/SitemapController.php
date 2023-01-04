<?php

namespace App\Controller;

use App\Repository\ServicesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SitemapController extends AbstractController
{
    #[Route('/sitemap.xml', name: 'app_sitemap', defaults:['_format' => 'xml'] )]
    public function index(
        Request $request,
        ServicesRepository $servicesRepository): Response
    {
        $hostName = $request->getSchemeAndHttpHost();

        $urls = [];
        $urls[] = ['loc' => $this->generateUrl('app_home')];
        $urls[] = ['loc' => $this->generateUrl('app_about')];
        $urls[] = ['loc' => $this->generateUrl('app_services')];
        $urls[] = ['loc' => $this->generateUrl('app_contact')];
        $urls[] = ['loc' => $this->generateUrl('app_faq')];
        
        foreach($servicesRepository->findAll() as $services)
        {
            $urls[] = [
                'loc' => $this->generateUrl('app_services_show', [
                    'slug' => $services->getSlug(),

                ])
            ];
        }
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'hostName' => $hostName,
                'urls' => $urls
            ]),
            200
        );

        $response->headers->set('Content-type', 'text/xml');
        
        return($response);
     
    }
}
