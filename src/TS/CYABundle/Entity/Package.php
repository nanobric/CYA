<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-02-07 09:03:01.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace TS\CYABundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * TS\CYABundle\Entity\Package
 *
 * @ORM\Entity(repositoryClass="Repository\PackageRepository")
 * @ORM\Table(name="Package")
 */
class Package
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="float")
     */
    protected $lodging_price;

    /**
     * @ORM\Column(name="`name`", type="string", length=250)
     */
    protected $name;

    /**
     * @ORM\Column(type="integer")
     */
    protected $semanas;

    /**
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="package")
     * @ORM\JoinColumn(name="id", referencedColumnName="Package_id", nullable=false)
     */
    protected $quotations;

    public function __construct()
    {
        $this->quotations = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \TS\CYABundle\Entity\Package
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of lodging_price.
     *
     * @param float $lodging_price
     * @return \TS\CYABundle\Entity\Package
     */
    public function setLodgingPrice($lodging_price)
    {
        $this->lodging_price = $lodging_price;

        return $this;
    }

    /**
     * Get the value of lodging_price.
     *
     * @return float
     */
    public function getLodgingPrice()
    {
        return $this->lodging_price;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \TS\CYABundle\Entity\Package
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of semanas.
     *
     * @param integer $semanas
     * @return \TS\CYABundle\Entity\Package
     */
    public function setSemanas($semanas)
    {
        $this->semanas = $semanas;

        return $this;
    }

    /**
     * Get the value of semanas.
     *
     * @return integer
     */
    public function getSemanas()
    {
        return $this->semanas;
    }

    /**
     * Add Quotation entity to collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Package
     */
    public function addQuotation(Quotation $quotation)
    {
        $this->quotations[] = $quotation;

        return $this;
    }

    /**
     * Remove Quotation entity from collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Package
     */
    public function removeQuotation(Quotation $quotation)
    {
        $this->quotations->removeElement($quotation);

        return $this;
    }

    /**
     * Get Quotation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotations()
    {
        return $this->quotations;
    }

    public function __sleep()
    {
        return array('id', 'lodging_price', 'name', 'semanas');
    }
}