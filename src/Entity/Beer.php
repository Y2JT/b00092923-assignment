<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/03/2018
 * Time: 23:08
 */

namespace App\Entity;


class Beer
{
    private $id;
    private $title;
    private $summary;
    private $photo;
    private $desc;
    private $ingredients;
    private $price;

    /**
     * Beer constructor.
     * @param $id
     * @param $title
     * @param $summary
     * @param $photo
     * @param $desc
     * @param $ingredients
     * @param $price
     */
    public function __construct($id, $title, $summary, $photo, $desc, $ingredients, $price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->summary = $summary;
        $this->photo = $photo;
        $this->desc = $desc;
        $this->ingredients = $ingredients;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param mixed $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
    }

    /**
     * @return mixed
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param mixed $photo
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * @param mixed $desc
     */
    public function setDesc($desc)
    {
        $this->desc = $desc;
    }

    /**
     * @return mixed
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}