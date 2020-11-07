<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Film;
use App\Form\RegistrationFormType;
use App\Entity\Copy;
use App\Repository\CopyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function homeController(CopyRepository $copyRepository): Response
    {
        $films = $this->getDoctrine()->getRepository(Film::class)->findAll();
        $copies= $copyRepository->findLast6Copies();
        //var_dump($copies);die('pepe');
        $form = $this->createForm(RegistrationFormType::class);

        $response= $this->render('home/base.html.twig',
            [
                'registrationForm' => $form->createView(),
                'films' => $films,
                'copies' => $copies
            ]);

        // cache for 3600 seconds
        $response->setSharedMaxAge(3600);
        $response->setMaxAge(3600);
        // (optional) set a custom Cache-Control directive
        $response->headers->addCacheControlDirective('must-revalidate', true);
        return $response;
    }
}
