<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Hotel;
use App\Entity\Chambre;
use App\Entity\Reservation;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class HomeController extends AbstractController
{
    private $entityManager;
    private $security;

    public function __construct(EntityManagerInterface $entityManager, Security $security)
    {
        $this->entityManager = $entityManager;
        $this->security = $security;
    }

    #[Route("/", name: 'home_index', methods: ['GET'])]
    public function index(): Response
    {
        $hotels = $this->entityManager->getRepository(Hotel::class)->findBy([], ['id' => 'DESC'], 6);

        return $this->render('home.html.twig', [
            'hotels' => $hotels,
        ]);
    }

    #[Route("/hotel/{id}", name: 'hotel_detail', methods: ['GET'])]
    public function showHotelDetail($id): Response
    {
        $hotel = $this->entityManager->getRepository(Hotel::class)->find($id);
        $user = $this->security->getUser();
        $userId = $user instanceof UserInterface ? $user->getId() : null;

        if (!$hotel) {
            throw $this->createNotFoundException('Hotel not found');
        }
        
        $chambres = $this->entityManager->getRepository(Chambre::class)->findBy(['hotel' => $hotel]);

        return $this->render('hotel_detail.html.twig', [
            'hotel' => $hotel,
            'chambres' => $chambres,
            'user_id' => $userId,
        ]);
    }

    #[Route("/hotel/{id_hotel}/chambre/{id_chambre}", name: 'reservation_detail', methods: ['GET'])]
    public function showHotelChambreDetail($id_hotel, $id_chambre): Response
    {
        $hotel = $this->entityManager->getRepository(Hotel::class)->find($id_hotel);
        $user = $this->security->getUser();
        $userId = $user instanceof UserInterface ? $user->getId() : null;

        if (!$hotel) {
            throw $this->createNotFoundException('Hotel not found');
        }

        $chambre = $this->entityManager->getRepository(Chambre::class)->find($id_chambre);

        if (!$chambre) {
            throw $this->createNotFoundException('Chambre not found');
        }

        return $this->render('reservation_detail.html.twig', [
            'hotel' => $hotel,
            'chambre' => $chambre,
            'user_id' => $userId,
        ]);
    }
    #[Route("/hotel/{id_hotel}/chambre/{id_chambre}/reservation", name: 'reservation_submit', methods: ['POST'])]
public function submitReservation(Request $request, $id_hotel, $id_chambre): Response
{
    // Récupérer les données du formulaire
    $dateArrivee = $request->request->get('date_arrivee');
    $dateDepart = $request->request->get('date_depart');
    $nombreAdultes = $request->request->get('nombre_adultes');
    $nombreEnfants = $request->request->get('nombre_enfants');
    
    // Récupérer l'ID de l'utilisateur
    $user = $this->getUser();
    $userId = $user ? $user->getId() : null;

    // Créer une nouvelle réservation
    $reservation = new Reservation();
    $reservation->setDateArrivee(new \DateTime($dateArrivee));
    $reservation->setDateDepart(new \DateTime($dateDepart));
    $reservation->setNombreAdultes($nombreAdultes);
    $reservation->setNombreEnfants($nombreEnfants);

    // Récupérer les entités de l'hôtel et de la chambre
    $hotel = $this->entityManager->getRepository(Hotel::class)->find($id_hotel);
    $chambre = $this->entityManager->getRepository(Chambre::class)->find($id_chambre);

    // Vérifier si l'hôtel et la chambre existent
    if (!$hotel || !$chambre) {
        // Redirection avec un message d'erreur si l'hôtel ou la chambre n'existe pas
        $this->addFlash('error', 'Hôtel ou chambre non trouvé');
        return $this->redirectToRoute('home_index');
    }

    // Associer les entités à la réservation
    $reservation->setClientId($user); // Set the client directly
    $reservation->setHotelId($hotel); // Set the hotel directly
    $reservation->setChambreId($chambre); // Set the chambre directly

    // Persistez la réservation dans la base de données
    $this->entityManager->persist($reservation);
    $this->entityManager->flush();

    // Vérifier si la réservation a été correctement enregistrée
    if ($reservation->getId()) {
        // Ajouter un message de succès si la réservation a réussi
        $this->addFlash('success', 'Réservation réussie');
    } else {
        // Ajouter un message d'erreur si la réservation a échoué
        $this->addFlash('error', 'Réservation échouée');
    }

    // Rediriger l'utilisateur vers la page de détail de la réservation
    return $this->redirectToRoute('reservation_detail', ['id_hotel' => $id_hotel, 'id_chambre' => $id_chambre]);
}



}