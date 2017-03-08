<?php

namespace FormationBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class EtudiantControllerTest extends WebTestCase
{
    public function testAjouteretudiant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ajouterEtudiant');
    }

    public function testModifieretudiant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/modiferEtudiant/{id}');
    }

    public function testSupprimeretudiant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/supprimerEtudiant/{id}');
    }

    public function testAfficheretudiant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/afficherEtudiant');
    }

    public function testAffecteretudiant()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/affecterEtudiant/{id}');
    }

}
