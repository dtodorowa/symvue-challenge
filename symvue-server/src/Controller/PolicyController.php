<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Policy;
use App\Repository\ClientRepository;
use App\Repository\InsurerRepository;
use App\Repository\CustomerRepository;
use App\Repository\PolicyTypeRepository;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PolicyController extends AbstractController
{
    private $clientRepo;
    private $insurerRepo;
    private $customerRepo;
    private $policyTypeRepo;

    public function __construct(ClientRepository $clientRepo, InsurerRepository $insurerRepo, CustomerRepository $customerRepo,  PolicyTypeRepository $policyTypeRepo) {
        $this->clientRepo = $clientRepo;
        $this->insurerRepo = $insurerRepo;
        $this->customerRepo = $customerRepo;
        $this->policyTypeRepo = $policyTypeRepo;
    }

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
        
        return $this->json($policy, Response::HTTP_OK);
    }

    #[Route('/policy', methods: 'POST')]
    public function add(ManagerRegistry $doctrine, Request $request)
    {
        $data = json_decode($request->getContent());
   
        $policy = new Policy();
        $policy->setCustomer($this->customerRepo->findOneBy(['id' => $data->customer_id]));
        $policy->setClient($this->clientRepo->findOneBy(['id' => $data->client_id]));
        $policy->setInsurer($this->insurerRepo->findOneBy(['id' => $data->insurer_id]));
        $policy->setPolicyType($this->policyTypeRepo->findOneBy(['id' => $data->policy_type_id]));
        $policy->setPremium($data->premium);
 
        $entityManager = $doctrine->getManager();
        $entityManager->persist($policy);
        $entityManager->flush();

        return $this->json($policy, Response::HTTP_CREATED);
    }

    #[Route('/policy/{id}', methods: 'DELETE')]
    public function delete(ManagerRegistry $doctrine, $id)
    {
        $policy = $doctrine->getRepository(Policy::class)->find($id);

        if (!$policy) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        $entityManager = $doctrine->getManager();      
        $entityManager->remove($policy);
        $entityManager->flush();

        return new Response('OK');
    }

    #[Route('/policy/{id}', methods: 'PUT')]
    public function edit(ManagerRegistry $doctrine, Request $request, $id)
    { 
        $entityManager = $doctrine->getManager();
        $data = json_decode($request->getContent());
        $policy = $entityManager->getRepository(Policy::class)->find($id);
        
        if (!$policy) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }

        $policy->setPremium($data->premium);

        $entityManager->flush();

        return new Response("OK");
    }
}
