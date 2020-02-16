<?php

namespace App\Controller;

use App\Services\Authors\AuthorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthorsController extends AbstractController
{
    private $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * @Route("/authors", name="authors")
     */
    public function index()
    {

        $authors = $this->authorService->all();

        dump($authors);

        exit();

//        return $this->render('authors/index.html.twig', [
//            'controller_name' => 'AuthorsController',
//        ]);
    }
}
