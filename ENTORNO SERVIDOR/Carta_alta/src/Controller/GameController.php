<?php

namespace App\Controller;

use App\Entity\Game;
use App\Entity\Card;
use App\Form\GameType;
use App\Repository\GameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/game')]
class GameController extends AbstractController
{
    #[Route('/', name: 'app_game_index', methods: ['GET'])]
    public function index(GameRepository $gameRepository): Response
    {
        return $this->render('game/index.html.twig', [
            'games' => $gameRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_game_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $game = new Game();
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('app_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('game/new.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    
    #[Route('/finish/{game}/{card}', name: 'app_game_finish', methods: ['GET'])]
    public function finish(Game $game, Card $card, EntityManagerInterface $entityManager): Response
    {
        // $card=$entityManager->getRepository(Card::class)->find($cardId);


        if(!in_array($card,$game->getCardsPlayer()->toArray()))
            return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
       
        if($game->getWin() != NULL)
             return $this->redirectToRoute('app_main', [], Response::HTTP_SEE_OTHER);
        // cargar la partida

        //modo facil
        $cardCpu= $game->getCardsCpu()->toArray()[array_rand($game->getCardsCpu()->toArray())];

        //modo dificil
        $cardCpu = $game->getBestCardCpu();
        
        if($cardCpu->getValue() > $card->getValue()){
            $game->setWin(0);
        }
        else $game->setWin(1);

        

        // actualizamos partida

        $entityManager->flush();

        //mostramos resultado



/*
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('app_game_index', [], Response::HTTP_SEE_OTHER);
        }
*/
        return $this->render('main/finish.html.twig', [
            'game' => $game,
            'cardCpu' => $cardCpu,
        ]);
    }
    #[Route('/{id}', name: 'app_game_show', methods: ['GET'])]
    public function show(Game $game): Response
    {
        return $this->render('game/show.html.twig', [
            'game' => $game,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_game_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Game $game, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(GameType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_game_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('game/edit.html.twig', [
            'game' => $game,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_game_delete', methods: ['POST'])]
    public function delete(Request $request, Game $game, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$game->getId(), $request->request->get('_token'))) {
            $entityManager->remove($game);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_game_index', [], Response::HTTP_SEE_OTHER);
    }
}
