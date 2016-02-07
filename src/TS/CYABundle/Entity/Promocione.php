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
 * TS\CYABundle\Entity\Promocione
 *
 * @ORM\Entity(repositoryClass="Repository\PromocioneRepository")
 * @ORM\Table(name="Promociones")
 */
class Promocione
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=250)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $code;

    /**
     * @ORM\Column(type="integer")
     */
    protected $percentage;

    /**
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="promocione")
     * @ORM\JoinColumn(name="id", referencedColumnName="Promociones_id", nullable=false)
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
     * @return \TS\CYABundle\Entity\Promocione
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
     * Set the value of name.
     *
     * @param string $name
     * @return \TS\CYABundle\Entity\Promocione
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
     * Set the value of code.
     *
     * @param string $code
     * @return \TS\CYABundle\Entity\Promocione
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of code.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of percentage.
     *
     * @param integer $percentage
     * @return \TS\CYABundle\Entity\Promocione
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get the value of percentage.
     *
     * @return integer
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Add Quotation entity to collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Promocione
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
     * @return \TS\CYABundle\Entity\Promocione
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
        return array('id', 'name', 'code', 'percentage');
    }
}