<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeImage
 *
 * @ORM\Table(name="type_image")
 * @ORM\Entity
 */
class TypeImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="libelle", type="string", length=50, nullable=true)
     */
    private $libelle;


}
