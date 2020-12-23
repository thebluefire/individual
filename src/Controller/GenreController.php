<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Form\GenreType;
use App\Repository\GenreRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/Genre")
 */
class GenreController extends AbstractController
{
    /**
     * @Route("/", name="Genre_index", methods={"GET"})
     */
    public function index(GenreRepository $GenreRepository): Response
    {
        return $this->render('Genre/index.html.twig', [
            'Genres' => $GenreRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="Genre_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $Genre = new Genre();
        $form = $this->createForm(GenreType::class, $Genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Genre);
            $entityManager->flush();

            return $this->redirectToRoute('Genre_index');
        }

        return $this->render('Genre/new.html.twig', [
            'Genre' => $Genre,
            'form' => $form->createView(),
        ]);
    }

    
    /**
     * @Route("/find/{name}", name="find_Genre_by_name")
     * @param $name
     * @param GenreRepository $GenreRepository
     * @return Response
     */
    public function findAllByName($name, GenreRepository $GenreRepository): Response
    {
        return $this->render('Genre/index.html.twig', [
            'Genres' => $GenreRepository->findByName($name),
        ]);
    }

    /**
     * @Route("/{id}", name="Genre_show", methods={"GET"})
     */
    public function show(Genre $Genre): Response
    {
        return $this->render('Genre/show.html.twig', [
            'Genre' => $Genre,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="Genre_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Genre $Genre): Response
    {
        $form = $this->createForm(GenreType::class, $Genre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('Genre_index');
        }

        return $this->render('Genre/edit.html.twig', [
            'Genre' => $Genre,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="Genre_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Genre $Genre): Response
    {
        if ($this->isCsrfTokenValid('delete'.$Genre->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($Genre);
            $entityManager->flush();
        }

        return $this->redirectToRoute('Genre_index');
    }
}
