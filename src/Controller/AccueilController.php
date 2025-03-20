<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of AccueilController
 *
 * @author Yoel
 */
class AccueilController {
    /**
     * @Route("/", name="acceuil")
     * @return Response
     */
    public function index(): Response{
        return new Response('hello world !');   
        }
}
