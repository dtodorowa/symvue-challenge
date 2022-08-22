<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Insurer;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsurerController extends AbstractController
{
    #[Route('/insurer', methods: 'GET')]
    public function getAll(ManagerRegistry $doctrine) 
    {
        $insurers = $doctrine->getRepository(Insurer::class)->findAll();
     
        return $this->json($insurers, Response::HTTP_OK);
    }

    #[Route('/insurer/{id}', methods: 'GET')]
    public function getById(ManagerRegistry $doctrine, $id) 
    {
        $insurer = $doctrine->getRepository(Insurer::class)->find($id);

        if (!$insurer) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        return $this->json($insurer, Response::HTTP_OK);
    }

}
