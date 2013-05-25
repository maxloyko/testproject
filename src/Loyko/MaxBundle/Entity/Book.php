<?php

namespace Loyko\MaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Book
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=512)
     */
    private $description;

        /**
         * @ORM\ManyToMany(targetEntity="Loyko\MaxBundle\Entity\Tag")
         * @ORM\JoinTable(name="tags_books",
         * joinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id", onDelete="cascade")},
         * inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id", onDelete="cascade")}
         * )
         */
    private $tags;

        /**
         * @ORM\ManyToMany(targetEntity="Loyko\MaxBundle\Entity\Author")
         * @ORM\JoinTable(name="authors_books",
         * joinColumns={@ORM\JoinColumn(name="book_id", referencedColumnName="id", onDelete="cascade")},
         * inverseJoinColumns={@ORM\JoinColumn(name="author_id", referencedColumnName="id", onDelete="cascade")}
         * )
         */
    private $authors;

    public function __toString()
    {
        return (string)$this->getTitle();
    }
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
     * Set title
     *
     * @param string $title
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add authors
     *
     * @param \Loyko\MaxBundle\Entity\Author $authors
     * @return Book
     */
    public function addAuthor(\Loyko\MaxBundle\Entity\Author $authors)
    {
        $this->authors[] = $authors;
    
        return $this;
    }

    /**
     * Remove authors
     *
     * @param \Loyko\MaxBundle\Entity\Author $authors
     */
    public function removeAuthor(\Loyko\MaxBundle\Entity\Author $authors)
    {
        $this->authors->removeElement($authors);
    }

    /**
     * Get authors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->authors = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add tags
     *
     * @param \Loyko\MaxBundle\Entity\Tag $tags
     * @return Book
     */
    public function addTag(\Loyko\MaxBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;
    
        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Loyko\MaxBundle\Entity\Tag $tags
     */
    public function removeTag(\Loyko\MaxBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }
}