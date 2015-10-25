<?php
namespace IAmBoard\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class AbstractIssue
 * @package IAmBoard\Entity
 * @ORM\Entity
 * @ORM\Table(name="board_item", indexes={@ORM\Index(name="type", columns={"type"})})
 */
abstract class BoardItem
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @var string Item Title
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string Item description (markdown)
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="Person")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var Collection|Person[]
     * @ORM\ManyToMany(targetEntity="Person")
     * @ORM\JoinTable(
     *     name="issues_assigned_persons",
     *     joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="issue_id", referencedColumnName="id")}
     * )
     */
    private $assignedTo;

    /**
     * @var BoardItem
     * @ORM\ManyToOne(targetEntity="BoardItem", inversedBy="children")
     * @ORM\JoinColumn(name="parent_item_id", referencedColumnName="id")
     */
    private $parentItem;

    /**
     * @var Collection|BoardItem[]
     * @ORM\OneToMany(targetEntity="BoardItem", mappedBy="parentItem")
     */
    private $children;

    /**
     * @var Project
     * @ORM\ManyToOne(targetEntity="Project", inversedBy="items")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BoardItem
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return BoardItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return BoardItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return BoardItem
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Person
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param Person $createdBy
     * @return BoardItem
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return Collection|Person[]
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * @param Collection|Person[] $assignedTo
     * @return BoardItem
     */
    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * @return BoardItem
     */
    public function getParentItem()
    {
        return $this->parentItem;
    }

    /**
     * @param BoardItem $parentItem
     * @return BoardItem
     */
    public function setParentItem($parentItem)
    {
        $this->parentItem = $parentItem;

        return $this;
    }

    /**
     * @return Collection|BoardItem[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Collection|BoardItem[] $children
     * @return BoardItem
     */
    public function setChildren($children)
    {
        $this->children = $children;

        return $this;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     * @return BoardItem
     */
    public function setProject($project)
    {
        $this->project = $project;

        return $this;
    }
}
