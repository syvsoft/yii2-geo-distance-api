<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

/**
 * Description of Coordinates
 *
 * @author Evgeniy
 */
class Coordinates
{
    private $lat;
    private $lng;
    
    public function __construct($lat, $lng)
    {
        $this->lat=$lat;
        $this->lng = $lng;
    }
}
