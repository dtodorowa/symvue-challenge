<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Customer;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    #[Route('/customer', methods: 'GET')]
    public function getAll(ManagerRegistry $doctrine) 
    {
        $customers = $doctrine->getRepository(Customer::class)->findAll();
     
        return $this->json($customers, Response::HTTP_OK);
    }

    #[Route('/customer/{id}', methods: 'GET')]
    public function getById(ManagerRegistry $doctrine, $id) 
    {
        $customer = $doctrine->getRepository(Customer::class)->find($id);

        if (!$customer) {
            throw $this->createNotFoundException(
                'No policy found for id '.$id
            );
        }
        
        return $this->json($customer, Response::HTTP_OK);
    }

}
