<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    /**
     * @Route("/test", name="hi_name")
     */

    public function hi()
    {
        $name = 'EVA';

        return  new Response(
            '<html><body>Hello my friend: '.$name.'</body></html>'
        );
    }
}