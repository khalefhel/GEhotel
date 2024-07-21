<?php

namespace App\Entity;

use App\Repository\HotelRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
#[ORM\Entity(repositoryClass: HotelRepository::class)]
#[Vich\Uploadable]
class Hotel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 5000, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $lieu = null;

    #[ORM\Column(nullable: true)]
    private ?float $nombre_de_chambres = null;

    #[ORM\Column(nullable: true)]
    private ?float $Nombre_etoile = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?float $prix_chambre = null;

    #[ORM\Column(type : 'string' , length: 255)]
    private ?string $attachment = null;
    #[Vich\UploadableField(mapping: 'hotel', fileNameProperty: 'attachment')]
    private ?File $attachmentFile = null;

    #[ORM\OneToMany(targetEntity: Chambre::class, mappedBy: 'hotel')]
    private Collection $chambres;

    #[ORM\OneToMany(targetEntity: Commentaires::class, mappedBy: 'hotel')]
    private Collection $commentaires;

    public function __construct()
    {
        $this->chambres = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): static
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getNombreDeChambres(): ?float
    {
        return $this->nombre_de_chambres;
    }

    public function setNombreDeChambres(?float $nombre_de_chambres): static
    {
        $this->nombre_de_chambres = $nombre_de_chambres;

        return $this;
    }

    public function getNombreEtoile(): ?float
    {
        return $this->Nombre_etoile;
    }

    public function setNombreEtoile(?float $Nombre_etoile): static
    {
        $this->Nombre_etoile = $Nombre_etoile;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrixChambre(): ?float
    {
        return $this->prix_chambre;
    }

    public function setPrixChambre(float $prix_chambre): static
    {
        $this->prix_chambre = $prix_chambre;

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

    /**
     * @return Collection<int, Chambre>
     */
    public function getChambres(): Collection
    {
        return $this->chambres;
    }

    public function addChambre(Chambre $chambre): static
    {
        if (!$this->chambres->contains($chambre)) {
            $this->chambres->add($chambre);
            $chambre->setHotel($this);
        }

        return $this;
    }

    public function removeChambre(Chambre $chambre): static
    {
        if ($this->chambres->removeElement($chambre)) {
            // set the owning side to null (unless already changed)
            if ($chambre->getHotel() === $this) {
                $chambre->setHotel(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaires>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaires $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setHotel($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaires $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getHotel() === $this) {
                $commentaire->setHotel(null);
            }
        }

        return $this;
    }
    }

