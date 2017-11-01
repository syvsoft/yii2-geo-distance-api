<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use app\models\Request;
use app\services\DbDistanceCalculator;
use app\services\DistanceCalculatorService;
use app\interfaces\DistanceCalculatorInterface;

/**
 * Description of Route
 *
 * @author Evgeniy
 */
class Route
{
    private $points = [];
    private $distance;
    private $distanceCalculator;
    
    public function __construct(DistanceCalculatorInterface $distanceCalculator)
    {
        $this->distanceCalculator = $distanceCalculator;
    }
    
    public function addPoint(Point $point) 
    {
        $this->points[] = $point;
        return $this;
    }
    
    public function clear()
    {
        $this->points = [];
        $this->distance = null;
    }
    
    public function getPoints()
    {
        return $this->points;
    }
    
    public function getDistance($refresh = false)
    {
        if (count($this->points) < 2) {
            return 0;
        }
        if ($this->distance === null || $refresh) {
            $distance = 0;
            $length = count($this->points);
            $i = 0;
            //var_dump($this->points);
            while ($i < $length-1) {
                $distance += $this->distanceCalculator->calculateDistance($this->points[$i], $this->points[$i+1]);
                $i += 1;
            }
            $this->distance = $distance;
        }
        return $this->distance;
    }
    
    public function split()
    {
        if (count($this->points) < 2) {
            return [];
        }
        $routes = [];
        $length = count($this->points);
        $i = 0;
        while ($i < $length-1) {
            $route = new self($this->distanceCalculator);
            $route->addPoint($this->points[$i])
                    ->addPoint($this->points[$i+1]);
            $route->getDistance();
            $routes[] = $route;
            $i += 1;
        }
        return  $routes;
    }
    
    public function __toString()
    {
        return implode(' - ', $this->points);
    }
}
