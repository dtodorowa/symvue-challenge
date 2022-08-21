<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Policy;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class PolicyController extends AbstractController
{
    #[Route('/policy', methods: 'GET')]
    public function getAll(ManagerRegistry $doctrine) 
    {
        $policies = $doctrine->getRepository(Policy::class)->findAll();
     
        return $this->json($policies, Response::HTTP_OK);
    }

    #[Route('/policy/{id}', methods: 'GET')]
    public function getById(ManagerRegistry $doctrine, $id) 
    {
        $policy = $doctrine->getRepository(Policy::class)->find($id);

        if (!$policy) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        return $this->json($policy);
    }

    #[Route('/policy', methods: 'POST')]
    public function add(ManagerRegistry $doctrine, Policy $p) 
    {
        $entityManager = $doctrine->getManager();

        $policy = new Policy();
        $policy->setClient($p->getClient());
        $policy->setCustomer($p->getCustomer());
        $policy->setPremium($p->getPremium());
        $policy->setInsurer($p->getInsurer());
        $policy->setPolicyType($p->getPolicyType());

        $entityManager->persist($policy);
        $entityManager->flush();

        return new Response('Saved new product with id '.$policy->getId());
    }
}
