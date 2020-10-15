<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param MailerInterface $mailer
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return Response
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function register(MailerInterface $mailer, Request $request, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $passwordEncoder->encodePassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // do anything else you need here, like send an email
            $email = (new TemplatedEmail())
                ->from(new Address('comunication@videoteca.cat', 'Videoteca 🎬'))
                ->to(new Address($user->getEmail(), $user->getUsername()))
                ->subject("📽️ Welcome to Videoteca!!! 🎬")
                ->htmlTemplate('email/welcome.html.twig')
                ->context(
                    [
                        //'user' => $user
                    ]
                )
            ;

            $mailer->send($email);

            return $this->redirectToRoute('home');
        }

        return $this->render('home/register_form.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
