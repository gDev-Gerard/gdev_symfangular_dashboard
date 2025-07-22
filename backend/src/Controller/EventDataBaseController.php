<?php

//declare(strict_types=1);
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Events;

class EventDataBaseController extends AbstractController
{
    private $em;
    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
    }
    #[Route('/event-db', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $datas = $this -> em ->getRepository(Events::class)->findBy(array(), array('id' => 'DESC'));
        return $this -> json ($datas, Response::HTTP_OK);
    }
}
