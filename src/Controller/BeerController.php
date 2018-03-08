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
     * @Route("/beer", name="beer_list")
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

    /**
     * @Route("/beer/{id}", name="beer_show")
     */
    public function showAction($id)
    {
        $beerRepository = new BeerRepository();
        $beer = $beerRepository->find($id);

        $template = 'beer/show.html.twig';
        $args = [
            'beer' => $beer
        ];

        if(!$beer){
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
    }
}
