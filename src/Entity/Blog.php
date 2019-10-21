<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlogRepository")
 */
class Blog
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $entry;

  public function getId(): ?int
  {
      return $this->id;
  }

  public function getEntry(): ?string
  {
      return $this->entry;
  }

  public function setEntry(string $entry): self
  {
      $this->entry = $entry;

      return $this;
  }
}
