<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Presenter
 *
 * @ORM\Table(name="presenter", indexes={@ORM\Index(name="id_produit", columns={"id_produit"}), @ORM\Index(name="id_image", columns={"id_image"})})
 * @ORM\Entity
 */
class Presenter
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
     * @var \Image
     *
     * @ORM\ManyToOne(targetEntity="Image")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_image", referencedColumnName="idImage")
     * })
     */
    private $idImage;

    /**
     * @var \Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_produit", referencedColumnName="id")
     * })
     */
    private $idProduit;


}
