<?php

namespace App\Controller;

use App\Entity\Game;
use App\Repository\CardRepository;
use App\Repository\GameRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    
    #[Route('/stats', name: 'app_stats')]
    public function stats(UserRepository $userRepository, GameRepository $gameRepository): Response
    {
        $users = $userRepository->findAll();
        $wins=[];
        foreach ($users as $user) {
            $wins[$user->getId()] = $gameRepository->getGamesWinsByUser($user);
        }

        $g=$gameRepository->getTopGamer();
        dd($g);

        return $this->render('main/stats.html.twig', [
            'users' => $users,
            'wins' => $wins,
        ]);
    }
    
    #[Route('/new-game', name: 'app_newgame')]
    public function newGame(CardRepository $cardRepository, EntityManagerInterface $entityManager): Response
    {

        $game = new Game();
        $game->setGameDateTime(new \DateTime());
        $game->setPlayer($this->getUser());

        $cards = $cardRepository->findAll();
        shuffle($cards);

        $game->addCardsPlayer($cards[0]);
        $game->addCardsPlayer($cards[1]);
        $game->addCardsPlayer($cards[2]);
        $game->addCardsCpu($cards[3]);
        $game->addCardsCpu($cards[4]);
        $game->addCardsCpu($cards[5]);
        
        $entityManager->persist($game);
        $entityManager->flush();


        return $this->render('main/game.html.twig', [
            'game' => $game,
        ]);
    }
}
