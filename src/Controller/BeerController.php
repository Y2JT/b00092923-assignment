<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Form\BeerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/beer", name="beer_")
 */
class BeerController extends Controller
{

    /**
     * @Route("/", name="index")
     *
     * @return Response
     */
    public function index()
    {
        $beers = $this->getDoctrine()
            ->getRepository(Beer::class)
            ->findAll();

        return $this->render('beer/index.html.twig', ['beer' => $beers]);
    }

    /**
     * @Route("/new", name="new")
     * @Method({"GET", "POST"})
     */
    public function new(Request $request)
    {
        $beer = new Beer();
        $form = $this->createForm(BeerType::class, $beer);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($beer);
            $em->flush();

            return $this->redirectToRoute('beer_edit', ['id' => $beer->getId()]);
        }

        return $this->render('beer/new.html.twig', [
            'beer' => $beer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="show")
     * @Method("GET")
     */
    public function show(Beer $beer)
    {
        return $this->render('beer/show.html.twig', [
            'beer' => $beer,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="edit")
     * @Method({"GET", "POST"})
     */
    public function edit(Request $request, Beer $beer)
    {
        $form = $this->createForm(BeerType::class, $beer);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('beer_edit', ['id' => $beer->getId()]);
        }

        return $this->render('beer/edit.html.twig', [
            'beer' => $beer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete")
     * @Method("DELETE")
     */
    public function delete(Request $request, Beer $beer)
    {
        if(!$this->isCsrfTokenValid('delete'.$beer->getId(), $request->request->get('_token'))){
            return $this->redirectToRoute('beer_index');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($beer);
        $em-flush();

        return $this->redirectToRoute('beer_index');
    }

}