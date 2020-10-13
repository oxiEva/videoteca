<?php
declare(strict_types=1);

namespace App\Controller;

use App\Form\RegistrationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

final class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */

    public function homeController(): Response
    {
        $form = $this->createForm(RegistrationFormType::class);
        return $this->render('home/base.html.twig',
            ['registrationForm' => $form->createView()]);
    }
}