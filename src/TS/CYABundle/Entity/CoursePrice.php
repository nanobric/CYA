<?php

namespace TS\CYABundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use TS\CYABundle\Doctrine\Behaviors\Loggable\Loggable as MoocAdminBundleLoggableTrait;

/**
 * TS\CYABundle\Entity\CoursePrice
 *
 * @ORM\Entity(repositoryClass="TS\CYABundle\Repository\CoursePriceRepository")
 * @ORM\Table(name="CoursePrice")
 */
class CoursePrice
{
    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\Blameable\Blameable;

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $weekmax;

    /**
     * @ORM\Column(type="integer")
     */
    protected $weekmin;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\ManyToOne(targetEntity="TS\CYABundle\Entity\Course", inversedBy="coursePrice")
     * @ORM\JoinColumn(name="course_id", referencedColumnName="id", nullable=false)
     */
    protected $course;

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param Course|null $course
     * @return $this
     */
    public function setCourse(Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \TS\CYABundle\Entity\CoursePrice
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
     * Set the value of weekmax.
     *
     * @param integer $weekmax
     * @return \TS\CYABundle\Entity\CoursePrice
     */
    public function setWeekmax($weekmax)
    {
        $this->weekmax = $weekmax;

        return $this;
    }

    /**
     * Get the value of weekmax.
     *
     * @return integer
     */
    public function getWeekmax()
    {
        return $this->weekmax;
    }

    /**
     * Set the value of weekmin.
     *
     * @param integer $weekmin
     * @return \TS\CYABundle\Entity\CoursePrice
     */
    public function setWeekmin($weekmin)
    {
        $this->weekmin = $weekmin;

        return $this;
    }

    /**
     * Get the value of weekmin.
     *
     * @return integer
     */
    public function getWeekmin()
    {
        return $this->weekmin;
    }

    /**
     * Set the value of price.
     *
     * @param float $price
     * @return \TS\CYABundle\Entity\CoursePrice
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    public function __sleep()
    {
        return array('id', 'weekmax', 'weekmin', 'price');
    }
}