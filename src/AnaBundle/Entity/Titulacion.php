<?php

namespace AnaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titulacion
 *
 * @ORM\Table(name="titulacion")
 * @ORM\Entity(repositoryClass="AnaBundle\Repository\TitulacionRepository")
 */
class Titulacion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
    * @ORM\OneToMany(targetEntity="alumnos", mappedBy="titulacion")
    */
    private $alumnos;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Titulacion
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->alumnos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add alumno
     *
     * @param \AnaBundle\Entity\alumnos $alumno
     *
     * @return Titulacion
     */
    public function addAlumno(\AnaBundle\Entity\alumnos $alumno)
    {
        $this->alumnos[] = $alumno;

        return $this;
    }

    /**
     * Remove alumno
     *
     * @param \AnaBundle\Entity\alumnos $alumno
     */
    public function removeAlumno(\AnaBundle\Entity\alumnos $alumno)
    {
        $this->alumnos->removeElement($alumno);
    }

    /**
     * Get alumnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnos()
    {
        return $this->alumnos;
    }

    public function __toString()
    {
      return $this->nombre;
    }
}
