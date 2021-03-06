<?php

namespace TS\CYABundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use TS\CYABundle\Doctrine\Behaviors\Loggable\Loggable as MoocAdminBundleLoggableTrait;

/**
 * TS\CYABundle\Entity\Lodging
 *
 * @ORM\Entity(repositoryClass="TS\CYABundle\Repository\LodgingRepository")
 * @ORM\Table(name="Lodging", indexes={@ORM\Index(name="fk_Alojamiento_Sede1_idx", columns={"headquarters_id"})})
 */
class Lodging
{
    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\Blameable\Blameable;

    const SIMPLE = "SIMPLE";
    const DOUBLE = "DOUBLE";
    const TRIPLE = "TRIPLE";

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=150)
     */
    protected $name;

    /**
     * @ORM\Column(name="`type`", type="string", length=100)
     */
    protected $type;

    /**
     * @ORM\Column(type="float")
     */
    protected $price_per_week;

    /**
     * @ORM\Column(type="float")
     */
    protected $summer_price;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(type="string")
     */
    protected $headquarters_id;

    /**
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="lodging")
     * @ORM\JoinColumn(name="id", referencedColumnName="Lodging_id", nullable=false)
     */
    protected $quotations;

    /**
     * @ORM\ManyToOne(targetEntity="Headquarter", inversedBy="lodgings")
     * @ORM\JoinColumn(name="headquarters_id", referencedColumnName="id", nullable=false)
     */
    protected $headquarter;

    public function __construct()
    {
        $this->quotations = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \TS\CYABundle\Entity\Lodging
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
     * @return mixed
     */
    public function getSummerPrice()
    {
        return $this->summer_price;
    }

    /**
     * @param mixed $summer_price
     */
    public function setSummerPrice($summer_price)
    {
        $this->summer_price = $summer_price;
    }

    /**
     * @return string
     */
    public function getNameWithType()
    {
        return sprintf('%s %s - %s', $this->getName(), $this->getType(), $this->getHeadquarter()->getName());
    }

    /**
     * @return string
     */
    public function getNameType()
    {
        return sprintf('%s - %s', $this->getName(), $this->getType());
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->getName().'-'.$this->getHeadquarter()->getName();
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \TS\CYABundle\Entity\Lodging
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
     * Set the value of type.
     *
     * @param string $type
     * @return \TS\CYABundle\Entity\Lodging
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        switch ($this->type) {
            case self::DOUBLE:
                return "DOBLE";
                break;
            case self::SIMPLE:
                return "INDIVIDUAL";
                break;
            case self::TRIPLE:
                return "MULTI";
                break;
        }

        return $this->type;
    }

    /**
     * Set the value of price_per_week.
     *
     * @param float $price_per_week
     * @return \TS\CYABundle\Entity\Lodging
     */
    public function setPricePerWeek($price_per_week)
    {
        $this->price_per_week = $price_per_week;

        return $this;
    }

    /**
     * Get the value of price_per_week.
     *
     * @return float
     */
    public function getPricePerWeek()
    {
        return $this->price_per_week;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \TS\CYABundle\Entity\Lodging
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of headquarters_id.
     *
     * @param integer $headquarters_id
     * @return \TS\CYABundle\Entity\Lodging
     */
    public function setHeadquartersId($headquarters_id)
    {
        $this->headquarters_id = $headquarters_id;

        return $this;
    }

    /**
     * Get the value of headquarters_id.
     *
     * @return integer
     */
    public function getHeadquartersId()
    {
        return $this->headquarters_id;
    }

    /**
     * Add Quotation entity to collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Lodging
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
     * @return \TS\CYABundle\Entity\Lodging
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

    /**
     * Set Headquarter entity (many to one).
     *
     * @param \TS\CYABundle\Entity\Headquarter $headquarter
     * @return \TS\CYABundle\Entity\Lodging
     */
    public function setHeadquarter(Headquarter $headquarter = null)
    {
        $this->headquarter = $headquarter;

        return $this;
    }

    /**
     * Get Headquarter entity (many to one).
     *
     * @return \TS\CYABundle\Entity\Headquarter
     */
    public function getHeadquarter()
    {
        return $this->headquarter;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->getName().$this->getId();
    }

    public function __sleep()
    {
        return array('id', 'name', 'type', 'price_per_week', 'description', 'headquarters_id');
    }
}