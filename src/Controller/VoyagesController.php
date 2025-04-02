<?php


namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Description of VoyagesController
 *
 * @author Yoel
 */
class VoyagesController extends AbstractController{
    
        /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAll();
        return $this->render("pages/voyages.html.twig",[
            'visites'=>$visites
        ]);   
        }
        
    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
        
    /**
     * 
     * @param VisiteRepository $repository
     */
    
    public function __construct(VisiteRepository$repository) {
        $this->repository=$repository;
    }
}
