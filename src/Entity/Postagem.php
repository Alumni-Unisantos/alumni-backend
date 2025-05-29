<?php

namespace App\Entity;

use App\Repository\PostagemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostagemRepository::class)]
class Postagem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $conteudo = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dataPostagem = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getConteudo(): ?string
    {
        return $this->conteudo;
    }

    public function setConteudo(?string $conteudo): static
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    public function getDataPostagem(): ?\DateTimeInterface
    {
        return $this->dataPostagem;
    }

    public function setDataPostagem(\DateTimeInterface $dataPostagem): static
    {
        $this->dataPostagem = $dataPostagem;

        return $this;
    }
}
