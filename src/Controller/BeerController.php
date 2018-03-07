<?php

namespace App\Controller;

use App\Entity\Beer;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BeerController extends Controller
{
    /**
     * @Route("/beer", name="beer_show")
     */
    public function showAction()
    {
        $beer = new Beer(1, 'Coors Light', 'Coors Light, made in the mountains', 'Photo', 'Coors Light is a drink', 'Some ingredients', 'Price range');

        $template = 'beer/show.html.twig';
        $args = [
            'beer' => $beer
        ];
        return $this->render($template, $args);
    }
}
