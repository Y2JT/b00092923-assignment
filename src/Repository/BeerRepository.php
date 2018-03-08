<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 07/03/2018
 * Time: 23:36
 */

namespace App\Repository;

use App\Entity\Beer;

class BeerRepository
{
    private $beers = [];

    public function __construct()
    {
        $id = 1;
        $b1 = new Beer($id, 'Coors Light', 'Summary of Coors', 'Photo of Coors', 'Description of Coors', 'Some ingredients', 'Price of Coors');
        $this->beers[$id] = $b1;

        $id = 2;
        $b2 = new Beer($id, 'Molson', 'Summary of Molson', 'Photo of Molson', 'Description of Molson', 'Some ingredients again', 'Price of Molson');
        $this->beers[$id] = $b2;

        $id = 3;
        $b3 = new Beer($id, 'Guinness', 'Summary of guinness', 'Photo of guinness', 'Description of guinness', 'Some ingredients for guinness', 'Price of guinness');
        $this->beers[$id] = $b3;
    }

    public function findAll()
    {
        return $this->beers;
    }

    public function find($id)
    {
        if(array_key_exists($id, $this->beers)){
            return $this->beers[$id];
        }    else{
            return null;
        }
    }
}