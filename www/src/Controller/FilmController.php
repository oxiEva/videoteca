<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class FilmController extends AbstractController
{
    /**
     * @Route("/film/list", name="film_list")
     */

    public function listAction(Request $request, FilmRepository $filmRepository)
    {
        $title = $request->get('title', 'Totoro');

        $films = $filmRepository->findAll();

        $filmsAsArray = [];

        foreach ($films as $film) {
            $filmsAsArray[] = [
                'id' => $film->getId(),
                'title' => $film->getTitle(),
                'description' => $film->getDescription()
            ];
        }
        $response = new JsonResponse();

        $response->setData(
            [

                'succes' => true,
                'films' => $filmsAsArray
            ]

        );

        return $response;
    }

    /**
     * @Route("/film/new", name="create_film")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function createFilm(Request $request, EntityManagerInterface $em)
    {
        $film = new Film();
        $film->setTitle('Spirited Away ');
        $film->setDescription(' 10-year old Chihiro becomes trapped in a forbidden world of gods and magic when her parents take her to investigate the other side of the tunnel.');

        //$em->persist($film);
        //$em->flush();

        $response = new JsonResponse();
        $response->setData(
            [

                'succes' => true,
                'films' => [

                    [
                        "id" => $film->getId(),
                        "title" => $film->getTitle(),
                        "description" => $film->getDescription(),

                    ]
                ]
            ]

        );

        return $response;
    }

}