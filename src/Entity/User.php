<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nm_user = null;

    #[ORM\Column(length: 255)]
    private ?string $email_user = null;

    #[ORM\Column(length: 255)]
    private ?string $vl_document = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rm_user = null;

    #[ORM\Column(length: 255)]
    private ?string $nm_curso = null;

    #[ORM\Column]
    private ?int $ano_conclusao_curso = null;

    #[ORM\Column]
    private ?bool $ck_vinculo_user = null;

    #[ORM\Column(length: 255)]
    private ?string $vl_contato = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNmUser(): ?string
    {
        return $this->nm_user;
    }

    public function setNmUser(string $nm_user): static
    {
        $this->nm_user = $nm_user;

        return $this;
    }

    public function getEmailUser(): ?string
    {
        return $this->email_user;
    }

    public function setEmailUser(string $email_user): static
    {
        $this->email_user = $email_user;

        return $this;
    }

    public function getVlDocument(): ?string
    {
        return $this->vl_document;
    }

    public function setVlDocument(string $vl_document): static
    {
        $this->vl_document = $vl_document;

        return $this;
    }

    public function getRmUser(): ?string
    {
        return $this->rm_user;
    }

    public function setRmUser(?string $rm_user): static
    {
        $this->rm_user = $rm_user;

        return $this;
    }

    public function getNmCurso(): ?string
    {
        return $this->nm_curso;
    }

    public function setNmCurso(string $nm_curso): static
    {
        $this->nm_curso = $nm_curso;

        return $this;
    }

    public function getAnoConclusaoCurso(): ?int
    {
        return $this->ano_conclusao_curso;
    }

    public function setAnoConclusaoCurso(int $ano_conclusao_curso): static
    {
        $this->ano_conclusao_curso = $ano_conclusao_curso;

        return $this;
    }

    public function isCkVinculoUser(): ?bool
    {
        return $this->ck_vinculo_user;
    }

    public function setCkVinculoUser(bool $ck_vinculo_user): static
    {
        $this->ck_vinculo_user = $ck_vinculo_user;

        return $this;
    }

    public function getVlContato(): ?string
    {
        return $this->vl_contato;
    }

    public function setVlContato(string $vl_contato): static
    {
        $this->vl_contato = $vl_contato;

        return $this;
    }
}
