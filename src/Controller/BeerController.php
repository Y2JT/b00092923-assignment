<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Repository\BeerRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BeerController extends Controller
{
    /**
     * @Route("/beer/list", name="beer_list")
     */
    public function listAction()
    {
        $beerRepository = new BeerRepository();
        $beers = $beerRepository->findAll();

        $template = 'beer/list.html.twig';
        $args = [
            'beers' => $beers
        ];
        return $this->render($template, $args);
    }
}
