<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
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
  protected $id;

  /**
   * @ORM\Column(type="string", length=255, nullable=true)
   * @Assert\NotBlank()
   * @Assert\Length(min="5", max="20", minMessage="5 karakterden fazla girilmelidir." )
   */
    protected $entry;


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
