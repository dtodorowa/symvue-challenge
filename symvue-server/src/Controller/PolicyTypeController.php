<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\PolicyType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PolicyTypeController extends AbstractController
{
    #[Route('/policyType', methods: 'GET')]
    public function getAll(ManagerRegistry $doctrine) 
    {
        $policyTypes = $doctrine->getRepository(PolicyType::class)->findAll();
     
        return $this->json($policyTypes, Response::HTTP_OK);
    }

    #[Route('/policyType/{id}', methods: 'GET')]
    public function getById(ManagerRegistry $doctrine, $id) 
    {
        $policyType = $doctrine->getRepository(PolicyType::class)->find($id);

        if (!$policyType) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        return $this->json($policyType, Response::HTTP_OK);
    }

}
