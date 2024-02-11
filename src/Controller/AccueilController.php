<?php



namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * Description of AccueilController
 *
 * @author yoelm
 */
class AccueilController {
    //put your code here
    /**
     * @Route ("/", name="acceuil")
     * @return Response
     */
    public function index(): Response{
        return new response('hello word');
    }
}
