<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_arrivee = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_depart = null;

    #[ORM\Column(nullable: true)]
    private ?float $nombre_adultes = null;

    #[ORM\Column(nullable: true)]
    private ?float $nombre_enfants = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $status = null;

    #[ORM\ManyToOne(inversedBy: 'chambre_id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $client_id = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Chambre $chambre_id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $hotel_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateArrivee(): ?\DateTimeInterface
    {
        return $this->date_arrivee;
    }

    public function setDateArrivee(\DateTimeInterface $date_arrivee): static
    {
        $this->date_arrivee = $date_arrivee;

        return $this;
    }

    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->date_depart;
    }

    public function setDateDepart(\DateTimeInterface $date_depart): static
    {
        $this->date_depart = $date_depart;

        return $this;
    }

    public function getNombreAdultes(): ?float
    {
        return $this->nombre_adultes;
    }

    public function setNombreAdultes(?float $nombre_adultes): static
    {
        $this->nombre_adultes = $nombre_adultes;

        return $this;
    }

    public function getNombreEnfants(): ?float
    {
        return $this->nombre_enfants;
    }

    public function setNombreEnfants(?float $nombre_enfants): static
    {
        $this->nombre_enfants = $nombre_enfants;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getClientId(): ?user
    {
        return $this->client_id;
    }

    public function setClientId(?user $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    public function getChambreId(): ?chambre
    {
        return $this->chambre_id;
    }

    public function setChambreId(?chambre $chambre_id): static
    {
        $this->chambre_id = $chambre_id;

        return $this;
    }

    public function getHotelId(): ?hotel
    {
        return $this->hotel_id;
    }

    public function setHotelId(?hotel $hotel_id): static
    {
        $this->hotel_id = $hotel_id;

        return $this;
    }
}
