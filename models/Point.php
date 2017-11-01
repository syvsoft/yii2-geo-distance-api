<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Point
 *
 * @author Evgeniy
 */
class Point
{
    private $name;
    private $coordinates;
    
    public function __construct($name, Coordinates $coordinates = null)
    {
        $this->name = $name;
        $this->coordinates = $coordinates;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getCoordinates()
    {
        return $this->coordinates;
    }
    
}
