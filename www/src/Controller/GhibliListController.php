<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Film;
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

    public function listAction(Request $request, LoggerInterface $logger)
    {
        $title = $request->get('title', 'Totoro');

        $logger->info('List action called 2');
        $response = new JsonResponse();

        $response->setData(
            [

                'succes' => true,
                'films' => [

                    [
                        "id" => 1,
                        "title" => "Castle in the Sky",
                        "description" => "The orphan Sheeta inherited a mysterious crystal that links her to the mythical sky-kingdom of Laputa. With the help of resourceful Pazu and a rollicking band of sky pirates, she makes her way to the ruins of the once-great civilization. Sheeta and Pazu must outwit the evil Muska, who plans to use Laputa's science to make himself ruler of the world."
                    ],

                    [
                        "id" => 2,
                        "title" => "Grave of the Fireflies",
                        "description" => "In the latter part of World War II, a boy and his sister, orphaned when their mother is killed in the firebombing of Tokyo, are left to survive on their own in what remains of civilian life in Japan. The plot follows this boy and his sister as they do their best to survive in the Japanese countryside, battling hunger, prejudice, and pride in their own quiet, personal battle."
                    ]

                    ,

                    [
                        "id" => 3,
                        "title" => $title,
                        "description" => " This film has the title that we pass in URL."
                    ]
                ]
            ]

        );

        return $response;
    }

    /**
     * @Route("/new/film", name="create_film")
     * @param Request $request
     * @param EntityManagerInterface $em
     */
    public function createFilm(Request $request, EntityManagerInterface $em)
    {
        $film = new Film();
        $film->setTitle('My Neighbor Totoro');
        $film->setDescription('Two sisters move to the country with their father in order to be closer to their hospitalized mother, and discover the surrounding trees are inhabited by Totoros, magical spirits of the forest. When the youngest runs away from home, the older sister seeks help from the spirits to find her.');

        $em->persist($film);
        $em->flush();

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