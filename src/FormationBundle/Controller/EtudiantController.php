<?php

namespace FormationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EtudiantController extends Controller
{
    public function ajouterEtudiantAction()
    {
        
        return $this->render('FormationBundle:Etudiant:ajouter_etudiant.html.twig', array(
            // ...
        ));
    }

    public function modifierEtudiantAction($id)
    {
        return $this->render('FormationBundle:Etudiant:modifier_etudiant.html.twig', array(
            // ...
        ));
    }

    public function supprimerEtudiantAction($id)
    {
        return $this->render('FormationBundle:Etudiant:supprimer_etudiant.html.twig', array(
            // ...
        ));
    }

    public function afficherEtudiantAction()
    {
        $re = $this->getDoctrine()->getRepository('FormationBundle:etudiants');
        $etd = $re->findAll();

        return $this->render('FormationBundle:Etudiant:afficher_etudiant.html.twig', array(
            'etudiants'=>$etd
        ));
    }

    public function affecterEtudiantAction($id)
    {
        return $this->render('FormationBundle:Etudiant:affecter_etudiant.html.twig', array(
            // ...
        ));
    }

}
