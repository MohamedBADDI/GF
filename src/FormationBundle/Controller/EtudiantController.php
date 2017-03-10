<?php

namespace FormationBundle\Controller;

use FormationBundle\Entity\Etudiants;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class EtudiantController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ajouterEtudiantAction(Request $request)
    {
        //création de l'objet etudiant
        $etudiant = new Etudiants();
        
        //créer le formulaire
        $formbuilder = $this->get('form.factory')->createBuilder(FormType::class,$etudiant);

        //ajouter les champs
        $formbuilder
            ->add('cin',TextType::class)
            ->add('nom',TextType::class)
            ->add('prenom',TextType::class)
            ->add('dateNaissance',BirthdayType::class)
            ->add('adresse',TextType::class)
            ->add('telephone',TextType::class)
            ->add('email',EmailType::class)
            ->add('ajouter',SubmitType::class)
        ;

        //on gére plutard les formation choisis

        $form = $formbuilder->getForm();

        //on passe la méthode createView() du formulaire a la vue

        //si la request est POST
        if ($request->isMethod('POST')){
            $form->handleRequest($request);

            if ($form->isValid()){
                $em = $this->getDoctrine()->getManager();
                $em->persist($etudiant);
                $em->flush();

                $request->getSession()->getFlashBag()->add('notice','étudiant bien enregistré.');
                return $this->redirectToRoute('afficher_etudiant',array('id'=>$etudiant->getId()));
            }
        }
        //afin qu'elle puisse afficher le formulaire toute seule

        return $this->render('FormationBundle:Etudiant:ajouter_etudiant.html.twig', array(
            'form' => $form->createView(),
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
        $re = $this->getDoctrine()->getRepository('FormationBundle:Etudiants');
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
