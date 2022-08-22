<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Client;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    #[Route('/client', methods: 'GET')]
    public function getAll(ManagerRegistry $doctrine) 
    {
        $clients = $doctrine->getRepository(Client::class)->findAll();
     
        return $this->json($clients, Response::HTTP_OK);
    }

    #[Route('/client/{id}', methods: 'GET')]
    public function getById(ManagerRegistry $doctrine, $id) 
    {
        $client = $doctrine->getRepository(Client::class)->find($id);

        if (!$client) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        return $this->json($client, Response::HTTP_OK);
    }

}
