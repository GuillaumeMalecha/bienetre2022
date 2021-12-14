<?php


namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\SearchForm;
use App\Repository\PrestataireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="app_search")
     */
    public function index(Request $request, PrestataireRepository $repo)
    {
        $form = $this->createForm(SearchForm::class);
        $form->handleRequest($request);

        $prestataire = $form->get('prestataire')->getData();
        $commune = $form->get('commune')->getData();
        $categorie = $form->get('categorie')->getData();

        $prestataires = $repo->findByPrestaCommuneService($prestataire, $commune, $categorie);
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'prestataires' => $prestataires
        ]);
    }
}