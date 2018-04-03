<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Repository\BeerRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BeerController extends Controller
{
    /**
     * @Route("/beer/new", name="beer_new", methods={"POST", "GET"})
     */
    public function newAction(Request $request)
    {
        $beer = new Beer();

        $form = $this->createFormBuilder($beer)
            ->add('title', TextType::class)
            ->add('summary', TextType::class)
            ->add('photo', TextType::class)
            ->add('desc', TextType::class)
            ->add('ingredients', TextType::class)
            ->add('price', TextType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Beer'))->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->createAction($beer);
        }

        $template = 'beer/new.html.twig';
        $argsArray = [
            'form' => $form->createView(),
        ];

        return $this->render($template, $argsArray);

    }

    public function createAction($beer)
    {
        $em = $this->getDoctrine()->getManager();
        $em->persist($beer);
        $em->flush();

        return $this->listAction($beer->getId());

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
            'beers' => $beers,
        ];
        return $this->render($template, $args);
    }

    /**
     * @Route("/beer/delete/{id}", name="beer_delete")
     */
    public function deleteAction(Beer $beer)
    {
        $em = $this->getDoctrine()->getManager();
        $beerRepository = $this->getDoctrine()->getRepository('App:Beer');

        $id = $beer->getId();
        $em->remove($beer);
        $em->flush();

        return $this->listAction();
    }

    /**
     * @Route("/beer/{id}", name="beer_show")
     */
    public function showAction(Beer $beer)
    {
        $template = 'beer/show.html.twig';
        $args = [
            'beer' => $beer
        ];

        if (!$beer) {
            $template = 'error/404.html.twig';
        }

        return $this->render($template, $args);
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
                'No beer found for id ' . $id
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