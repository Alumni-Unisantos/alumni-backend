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
    private ?int $userId = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $conteudo = null;

    #[ORM\Column(type: 'datetime')]
    private ?\DateTimeInterface $dataPostagem = null;

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(?string $userId): ?int
    {
        $this->userId = $userId;

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
