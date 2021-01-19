<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity
 */
class Producto
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="procesador", type="string", length=20, nullable=false)
     */
    private $procesador;

    /**
     * @var string
     *
     * @ORM\Column(name="pantalla", type="string", length=20, nullable=false)
     */
    private $pantalla;

    /**
     * @var string|null
     *
     * @ORM\Column(name="camara", type="string", length=20, nullable=true)
     */
    private $camara;

    /**
     * @var int
     *
     * @ORM\Column(name="bateria", type="integer", nullable=false)
     */
    private $bateria;

    /**
     * @var string
     *
     * @ORM\Column(name="imagen", type="string", length=255, nullable=false)
     */
    private $imagen;

    /**
     * @var string
     *
     * @ORM\Column(name="conectividad", type="string", length=20, nullable=false)
     */
    private $conectividad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=10, nullable=false)
     */
    private $tipo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getProcesador(): ?string
    {
        return $this->procesador;
    }

    public function setProcesador(string $procesador): self
    {
        $this->procesador = $procesador;

        return $this;
    }

    public function getPantalla(): ?string
    {
        return $this->pantalla;
    }

    public function setPantalla(string $pantalla): self
    {
        $this->pantalla = $pantalla;

        return $this;
    }

    public function getCamara(): ?string
    {
        return $this->camara;
    }

    public function setCamara(?string $camara): self
    {
        $this->camara = $camara;

        return $this;
    }

    public function getBateria(): ?int
    {
        return $this->bateria;
    }

    public function setBateria(int $bateria): self
    {
        $this->bateria = $bateria;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->imagen;
    }

    public function setImagen(string $imagen): self
    {
        $this->imagen = $imagen;

        return $this;
    }

    public function getConectividad(): ?string
    {
        return $this->conectividad;
    }

    public function setConectividad(string $conectividad): self
    {
        $this->conectividad = $conectividad;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }


}
