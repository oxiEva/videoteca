<?php

namespace App\DataFixtures;

use App\Entity\Copy;
use App\Entity\Film;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        /*$film = new Film();
        $film->setTitle('Inside Out ')
            ->setDescription("Growing up can be a bumpy road, and it's no exception for Riley, who is uprooted from her Midwest life when her father starts a new job in San Francisco. 
            Like all of us, Riley is guided by her emotions - Joy, Fear, Anger, Disgust and Sadness. ")
            ->setCreatedAt(new \DateTime('now'));

        $film2 = clone($film);
        $film2->setTitle('Inside Out 2' );
        var_dump($film2);exit();*/

        /*$film = new Film();
        $film->setTitle('Inside Out ')
            ->setDescription("Growing up can be a bumpy road, and it's no exception for Riley, who is uprooted from her Midwest life when her father starts a new job in San Francisco. 
            Like all of us, Riley is guided by her emotions - Joy, Fear, Anger, Disgust and Sadness. ")
            ->setCreatedAt(new \DateTime('now'));*/
        /*$film = new Film();
        $film->setTitle('Your name ')
            ->setDescription("Mitsuha is the daughter of the mayor of a small mountain town. She's a straightforward high school girl who lives with her sister and her grandmother and has no qualms about letting it be known that she's uninterested in Shinto rituals or helping her father's electoral campaign.
             Instead she dreams of leaving the boring town and trying her luck in Tokyo.  ")
            ->setCreatedAt(new \DateTime('now'));*/

        /*$film = new Film();
         $film->setTitle('Spider-Man: Into the Spider-Verse ')
             ->setDescription("Miles Morales comes across the long-dead Peter Parker. This Peter Parker is not from his world though; he's from somewhere else in the multiverse. With Parker's guidance, Miles will become Spider-Man:
             and through that he will become part of the ever-expanding 'Spider-Verse'. ")
             ->setCreatedAt(new \DateTime('now'));*/

        /*$film = new Film();
        $film->setTitle('Klaus ')
            ->setDescription("A simple act of kindness always sparks another, even in a frozen, faraway place. When Smeerensburg's new postman, Jesper, befriends toymaker Klaus, their gifts melt an age-old feud and deliver a sleigh full of holiday traditions. ")
            ->setCreatedAt(new \DateTime('now'));*/

        /* $film = new Film();
         $film->setTitle('Isle of Dogs  ')
             ->setDescription("When, by executive decree, all the canine pets of Megasaki City are exiled to a vast garbage-dump called Trash Island, 12-year-old Atari sets off alone
             in a miniature Junior-Turbo Prop and flies across the river in search of his bodyguard-dog, Spots.  ")
             ->setCreatedAt(new \DateTime('now'));*/

        /*$film = new Film();
        $film->setTitle('I Lost My Body  ')
            ->setDescription("A cut-off hand escapes from a dissection lab with one crucial goal: to get back to its body. As it scrambles through the pitfalls of Paris, it remembers its life with the young man it was once attached to… until they met Gabrielle.")
            ->setCreatedAt(new \DateTime('now'));*/

        //$manager->persist($film);
        /*$user = new User();
        $user->setEmail('default@videoteca.cat')
            ->setRoles((array)'ROLE_ADMIN')
            ->setPassword('admin44')
            ->setUsername('administrator');

        $manager->persist($user);
        $manager->flush();*/

        /*$copy = new Copy();
        $copy->setTitle('Room')
            ->setVendor(User::class->setId(7))
            ->setPrice(rand(5, 30))
            ->setStatus('New')
            ->setDateOfSale(null)
            ->setCreationDate(new \DateTime())
            ->setLanguage('en')
            ->setFilm(new Film())
        ;
        $manager->persist($copy);
        $manager->flush();*/
        // $manager->flush();
    }
}
