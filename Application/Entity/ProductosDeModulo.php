<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProductosDeModulo
 *
 * @ORM\Table(name="ProductosDeModulo")
 * @ORM\Entity
 */
class ProductosDeModulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cantidad;

    /**
     * @var \Application\Entity\Modulo
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Application\Entity\Modulo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="moduloId", referencedColumnName="idModulo", nullable=false)
     * })
     */
    private $moduloId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\Productos", inversedBy="id_prodcutos")
     * @ORM\JoinTable(name="idProducto",
     *   joinColumns={
     *     @ORM\JoinColumn(name="productosdemodulo_id", referencedColumnName="id", onDelete="CASCADE")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="productos_id", referencedColumnName="id", onDelete="CASCADE")
     *   }
     * )
     */
    private $idProducto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idProducto = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return ProductosDeModulo
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set moduloId
     *
     * @param \Application\Entity\Modulo $moduloId
     *
     * @return ProductosDeModulo
     */
    public function setModuloId(\Application\Entity\Modulo $moduloId)
    {
        $this->moduloId = $moduloId;

        return $this;
    }

    /**
     * Get moduloId
     *
     * @return \Application\Entity\Modulo
     */
    public function getModuloId()
    {
        return $this->moduloId;
    }

    /**
     * Add idProducto
     *
     * @param \Application\Entity\Productos $idProducto
     *
     * @return ProductosDeModulo
     */
    public function addIdProducto(\Application\Entity\Productos $idProducto)
    {
        $this->idProducto[] = $idProducto;

        return $this;
    }

    /**
     * Remove idProducto
     *
     * @param \Application\Entity\Productos $idProducto
     */
    public function removeIdProducto(\Application\Entity\Productos $idProducto)
    {
        $this->idProducto->removeElement($idProducto);
    }

    /**
     * Get idProducto
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}

