<?php


namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render('pages/voyages.html.twig',[
            'visites'=> $visites
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
    
    /**
     * @Route("/voyages/tri/{champ}/{ordre}", name="voyages.sort")
     * @param type $champ 
     * @param type $ordre
     * @return Respoonse 
     */
    public function sort ($champ, $ordre): Response{
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
        return $this->render('pages/voyages.html.twig',[
            'visites'=> $visites
            ]);  
    }
    
    /**
     * @Route("/voyages/recherche/{champ}",name="voyages.findallequal")
     * @param type $champ 
     * @param Request $request 
     * @return Response 
     */
    public function findALLEqual($champ, Request $request):Response {
        $valeur = $request->get("recherche");
        $visites = $this->repository->FindByEqualValue($champ, $valeur);
        return $this->render("pages/voyages.html.twig",[
            'visites'=>$visites
        ]);    
    }
}
