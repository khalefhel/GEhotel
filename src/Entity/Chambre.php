<?php

namespace App\Entity;

use App\Repository\ChambreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[ORM\Entity(repositoryClass: ChambreRepository::class)]
#[Vich\Uploadable]
class Chambre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $type = null;

    #[ORM\Column]
    private ?float $prix_par_nuit = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(nullable: true)]
    private ?float
     $nombre_de_lits = null;

    #[ORM\ManyToOne(inversedBy: 'chambres')]
    private ?Hotel $hotel = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'chambre_id')]
    private Collection $reservations;

    #[ORM\Column(length: 255)]
    private ?string $attachment = null;
    #[Vich\UploadableField(mapping: 'chambre', fileNameProperty: 'attachment')]
    private ?File $attachmentFile = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attachment2 = null;
    #[Vich\UploadableField(mapping: 'chambre', fileNameProperty: 'attachment2')]
    private ?File $attachmentFile2 = null;
    
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attachment3 = null;
    #[Vich\UploadableField(mapping: 'chambre', fileNameProperty: 'attachment3')]
    private ?File $attachmentFile3 = null;
    

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getPrixParNuit(): ?float
    {
        return $this->prix_par_nuit;
    }

    public function setPrixParNuit(float $prix_par_nuit): static
    {
        $this->prix_par_nuit = $prix_par_nuit;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNombreDeLits(): ?float
    {
        return $this->nombre_de_lits;
    }

    public function setNombreDeLits(?float $nombre_de_lits): static
    {
        $this->nombre_de_lits = $nombre_de_lits;

        return $this;
    }

    public function getHotel(): ?hotel
    {
        return $this->hotel;
    }

    public function setHotel(?hotel $hotel): static
    {
        $this->hotel = $hotel;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setChambreId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getChambreId() === $this) {
                $reservation->setChambreId(null);
            }
        }

        return $this;
    }

    public function getAttachment(): ?string
    {
        return $this->attachment;
    }

    public function setAttachment(string $attachment): static
    {
        $this->attachment = '/uploads/attachments/' . $attachment;

        return $this;
    }
    public function getAttachmentFile(): ?File
    {
        return $this->attachmentFile;
    }
    public function setAttachmentFile(?File $attachmentFile = null): void
    {
        $this->attachmentFile = $attachmentFile;
    }
    public function getAttachment2(): ?string
    {
        return $this->attachment2;
    }

    public function setAttachment2(string $attachment2): static
    {
        $this->attachment2 = '/uploads/attachments/' . $attachment2;

        return $this;
    }
    public function getAttachmentFile2(): ?File
    {
        return $this->attachmentFile2;
    }
    public function setAttachmentFile2(?File $attachmentFile2 = null): void
    {
        $this->attachmentFile2 = $attachmentFile2;
    }
    public function getAttachment3(): ?string
    {
        return $this->attachment3;
    }

    public function setAttachment3(string $attachment3): static
    {
        $this->attachment3 = '/uploads/attachments/' . $attachment3;

        return $this;
    }
    public function getAttachmentFile3(): ?File
    {
        return $this->attachmentFile3;
    }
    public function setAttachmentFile3(?File $attachmentFile3 = null): void
    {
        $this->attachmentFile3 = $attachmentFile3;
    }

}
