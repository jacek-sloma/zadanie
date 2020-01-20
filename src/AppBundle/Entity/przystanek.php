<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * przystanek
 *
 * @ORM\Table(name="przystanek")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\przystanekRepository")
 */
class przystanek
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
     * @ORM\Column(name="adres", type="string", length=1024)
     */
    private $adres;

    /**
     * @var string
     *
     * @ORM\Column(name="opis", type="text", nullable=true)
     */
    private $opis;

    /**
     * @var string
     *
     * @ORM\Column(name="zdjecie1", type="string", length=1024, nullable=true)
     */
    private $zdjecie1;

    /**
     * @var string
     *
     * @ORM\Column(name="zdjecie2", type="string", length=1024, nullable=true)
     */
    private $zdjecie2;

    /**
     * @var string
     *
     * @ORM\Column(name="zdjecie3", type="string", length=1024, nullable=true)
     */
    private $zdjecie3;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datadodania", type="datetime")
     */
    private $datadodania;

    /**
     * @var int
     *
     * @ORM\Column(name="userid", type="integer")
     */
    private $userid;

    /**
     * @var bool
     *
     * @ORM\Column(name="czyodczytano", type="boolean")
     */
    private $czyodczytano;


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
     * Set adres
     *
     * @param string $adres
     *
     * @return przystanek
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set zdjecie1
     *
     * @param string $zdjecie1
     *
     * @return zdjecie1
     */
    public function setZdjecie1($zdjecie1)
    {
        $this->zdjecie1 = $zdjecie1;

        return $this;
    }

    /**
     * Get zdjecie1
     *
     * @return string
     */
    public function getZdjecie1()
    {
        return $this->zdjecie1;
    }

    /**
     * Set zdjecie2
     *
     * @param string $zdjecie2
     *
     * @return zdjecie2
     */
    public function setZdjecie2($zdjecie2)
    {
        $this->zdjecie2 = $zdjecie2;

        return $this;
    }

    /**
     * Get zdjecie2
     *
     * @return string
     */
    public function getZdjecie2()
    {
        return $this->zdjecie2;
    }

    /**
     * Set zdjecie3
     *
     * @param string $zdjecie3
     *
     * @return zdjecie3
     */
    public function setZdjecie3($zdjecie3)
    {
        $this->zdjecie3 = $zdjecie3;

        return $this;
    }

    /**
     * Get zdjecie3
     *
     * @return string
     */
    public function getZdjecie3()
    {
        return $this->zdjecie3;
    }

    /**
     * Set opis
     *
     * @param string $opis
     *
     * @return przystanek
     */
    public function setOpis($opis)
    {
        $this->opis = $opis;

        return $this;
    }

    /**
     * Get opis
     *
     * @return string
     */
    public function getOpis()
    {
        return $this->opis;
    }

    /**
     * Set datadodania
     *
     * @param \DateTime $datadodania
     *
     * @return przystanek
     */
    public function setDatadodania($datadodania)
    {
        $this->datadodania = $datadodania;

        return $this;
    }

    /**
     * Get datadodania
     *
     * @return \DateTime
     */
    public function getDatadodania()
    {
        return $this->datadodania;
    }

    /**
     * Set userid
     *
     * @param integer $userid
     *
     * @return przystanek
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;

        return $this;
    }

    /**
     * Get userid
     *
     * @return int
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * Set czyodczytano
     *
     * @param boolean $czyodczytano
     *
     * @return przystanek
     */
    public function setCzyodczytano($czyodczytano)
    {
        $this->czyodczytano = $czyodczytano;

        return $this;
    }

    /**
     * Get czyodczytano
     *
     * @return bool
     */
    public function getCzyodczytano()
    {
        return $this->czyodczytano;
    }


    public function setZdjecie($nr,$nowanazwazdjeciazprefixem)
    {   
        if ($nr==1) {
            $this->zdjecie1 = $nowanazwazdjeciazprefixem;
        }
        if ($nr==2) {
            $this->zdjecie2 = $nowanazwazdjeciazprefixem;
        }
        if ($nr==3) {
            $this->zdjecie3 = $nowanazwazdjeciazprefixem;
        }
        return $this;
    }
}

