<?php


namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\RecherchePrestataireType;
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
        $form=$this->createForm(RecherchePrestataireType::class);
        $form->handleRequest($request);

        $prestataire = $form->get('prestataire')->getData();
        $localite =$form->get('commune')->getData();
        $categorie = $form->get('categorie')->getData();

        $prestataires = $repo->findAllWithJoins($localite);
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
            'prestataires' =>$prestataires
        ]);
    }
    /**
     *@Route("/search-form", name="app_form_recherche")
     */
    public function getFormRecherche(){

        $form = $this->createForm(RecherchePrestataireType::class);

        return $this->render('site/_partials/_form_recherche.html.twig',
            ['formulaire'=> $form->createView()]
        );
    }

    /**
     * @param Prestataire $prestataire
     * @Route("/prestataires/{nom}", name="app_presta_name")
     */
    public function getPrestataireByName(Prestataire $prestataire)
    {
        return $this->render("site/prestataires/prestataire.html.twig", ['prestataire'=>$prestataire]);
    }

    /**
     * @Route("/prestataires", name="app_prestataires")
     */
    public function getAllPrestataires(PrestataireRepository $repo)
    {
        $prestataires = $repo->findAll();
        return $this->render('allprestataire.html.twig',['prestataires'=>$prestataires]);

    }

}