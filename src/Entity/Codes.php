<?php

namespace App\Entity;

use App\Repository\CodesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodesRepository::class)]
class Codes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'array')]
    private $code = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?array
    {
        return $this->code;
    }

    public function setCode(array $code): self
    {
        $this->code = $code;

        return $this;
    }
}
