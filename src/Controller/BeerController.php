<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Repository\BeerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BeerController extends Controller
{
    /**
     * @Route("/beer/create/{title}/{summary}/{photo}/{desc}/{ingredients}/{price}", name="beer_create")
     */
    public function createAction($title, $summary, $photo, $desc, $ingredients, $price)
    {
        $beer = new Beer();
        $beer->setTitle($title);
        $beer->setSummary($summary);
        $beer->setPhoto($photo);
        $beer->setDesc($desc);
        $beer->setIngredients($ingredients);
        $beer->setPrice($price);

        // entity manager
        $em = $this->getDoctrine()->getManager();

        $em->persist($beer);

        $em->flush();

        return new Response('Created new beer with id ' .$beer->getId());

    }


    /**
     * @Route("/beer", name="beer_list")
     */
    public function listAction()
    {
        $beerRepository = $this->getDoctrine()->getRepository('App:Beer');
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
        $em = $this->getDoctrine()->getManager();
        $beer = $em->getRepository('App:Beer')->find($id);

        $template = 'beer/show.html.twig';
        $args = [
            'beer' => $beer
        ];

        if(!$beer){
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
    }

    /**
     * @Route("/beer/delete/{id}")
     */
    public function deleteAction($id)
    {
        // entity manager
        $em = $this->getDoctrine()->getManager();
        $beerRepository = $this->getDoctrine()->getRepository('App:Beer');
        // find thge student with this ID
        $beer = $beerRepository->find($id);
        // tells Doctrine you want to (eventually) delete the Student (no queries yet)
        $em->remove($beer);
        // actually executes the queries (i.e. the DELETE query)
        $em->flush();
        return new Response('Deleted beer with id '.$id);
    }
    /**
     * @Route("/beer/update/{id}/{newTitle}/{newSummary}/{newPhoto}/{newDesc}/{newIngredients}/{newPrice}")
     */
    public function updateAction($id, $newTitle, $newSummary, $newPhoto, $newDesc, $newIngredients, $newPrice)
    {
        $em = $this->getDoctrine()->getManager();
        $beer = $em->getRepository('App:Beer')->find($id);
        if (!$beer) {
            throw $this->createNotFoundException(
                'No beer found for id '.$id
            );
        }
        $beer->setTitle($newTitle);
        $beer->setTitle($newSummary);
        $beer->setTitle($newPhoto);
        $beer->setTitle($newDesc);
        $beer->setTitle($newIngredients);
        $beer->setTitle($newPrice);
        $em->flush();
        return $this->redirectToRoute('beer_show', [
            'id' => $beer->getId()
        ]);
    }
}
