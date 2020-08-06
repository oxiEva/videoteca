<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Film;
use App\Repository\FilmRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class GhibliListController extends AbstractController
{
    /**
     * @Route("/ghibli/list", name="ghibli_list")
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
     * @Route("/new/film", name="create_film")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return JsonResponse
     */
    public function createFilm(Request $request, EntityManagerInterface $em)
    {
        $film = new Film();
        $film->setTitle('Castle in the Sky');
        $film->setDescription('The orphan Sheeta inherited a mysterious crystal that links her to the mythical sky-kingdom of Laputa. With the help of resourceful Pazu and a rollicking band of sky pirates, she makes her way to the ruins of the once-great civilization. ');

        //$em->persist($film);
        // $em->flush();

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