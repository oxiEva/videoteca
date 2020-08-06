<?php
declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

final class GhibliListController extends AbstractController
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger =$logger;
    }

    /**
     * @Route("/ghibli/list", name="ghibli_list")
     */

    public function listAction(Request $request)
    {
        $title = $request->get('title', 'Totoro');

        $this->logger->info('List action called');
        $response = new JsonResponse();

        $response->setData(
            [

                'succes' => true,
                'films' => [

                    [
                        "id" => 1,
                        "title" => "Castle in the Sky",
                        "description" => "The orphan Sheeta inherited a mysterious crystal that links her to the mythical sky-kingdom of Laputa. With the help of resourceful Pazu and a rollicking band of sky pirates, she makes her way to the ruins of the once-great civilization. Sheeta and Pazu must outwit the evil Muska, who plans to use Laputa's science to make himself ruler of the world.",
                        "release_date" => "1986",
                        "rt_score" => "95"

                    ],

                    [
                        "id" => 2,
                        "title" => "Grave of the Fireflies",
                        "description" => "In the latter part of World War II, a boy and his sister, orphaned when their mother is killed in the firebombing of Tokyo, are left to survive on their own in what remains of civilian life in Japan. The plot follows this boy and his sister as they do their best to survive in the Japanese countryside, battling hunger, prejudice, and pride in their own quiet, personal battle.",
                        "release_date" => "1988",
                        "rt_score" => "97"
                    ]

                    ,

                    [
                        "id" => 3,
                        "title" => $title,
                        "description" => " This film has the title that we pass in URL.",
                        "release_date" => "2020",
                        "rt_score" => "99"
                    ]
                ]
            ]

        );

        return $response;
    }

}