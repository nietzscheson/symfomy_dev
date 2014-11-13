<?php

namespace ADMIN\ACLBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorias
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ADMIN\ACLBundle\Entity\CategoriasRepository")
 */
class Categorias
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=255)
     */
    private $categoria;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set categoria
     *
     * @param string $categoria
     * @return Categorias
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @ORM\OneToMany(targetEntity="Productos", mappedBy="categoria")
     */
    protected $productos;

    public function __construct()
    {
        $this->productos = new ArrayCollection();
    }

    /**
     * Add productos
     *
     * @param \ADMIN\ACLBundle\Entity\Productos $productos
     * @return Categorias
     */
    public function addProducto(\ADMIN\ACLBundle\Entity\Productos $productos)
    {
        $this->productos[] = $productos;

        return $this;
    }

    /**
     * Remove productos
     *
     * @param \ADMIN\ACLBundle\Entity\Productos $productos
     */
    public function removeProducto(\ADMIN\ACLBundle\Entity\Productos $productos)
    {
        $this->productos->removeElement($productos);
    }

    /**
     * Get productos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductos()
    {
        return $this->productos;
    }
}
