<?php



namespace App\Controller\admin;

use App\Entity\Visite;
use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AdminVoyagesController
 *
 * @author Yoel
 */
class AdminVoyagesController extends AbstractController {
        

    /**
     * 
     * @var VisiteRepository
     */
    private $repository;
        
    /**
     * 
     * @param VisiteRepository $repository
     */
    
    public function __construct(VisiteRepository $repository) {
        $this->repository=$repository;
    }
    
            /**
     * @Route("/admin", name="admin.voyages")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAllOrderBy('datecreation', 'DESC');
        return $this->render('admin/admin.voyages.html.twig',[
            'visites'=> $visites
            ]);   
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
    
    /**
     * @Route("/voyages/voyage/{id}", name="voyages.showone")
     * @param type $id 
     * @return Response
     */
    public function showOne($id): Response{
        $visite = $this->repository->find($id);
        return $this->render("pages/voyage.html.twig",[
            'visite' => $visite
        ]);
        
    }
    
    /**
     * @Route("/admin/suppr/{id}", name="admin.voyage.suppr")
     * @param Visite $visite 
     * @return Response 
     */
    public function suppr(Visite $visite): Response{
        $this->repository->remove($visite, true);
        return $this->redirectToRoute('admin.voyages');
        
    }
}
