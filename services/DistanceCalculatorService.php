<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\models\Point;
use app\models\Distance;
use app\exceptions\BadPointException;
use app\interfaces\DistanceCalculatorInterface;

/**
 * Description of DistanceCalculatorService
 *
 * @author Evgeniy
 */
class DistanceCalculatorService
{
    private $distanceCalculator;
    
    public function __construct(DistanceCalculatorInterface $distanceCalculator)
    {
        $this->distanceCalculator = $distanceCalculator;
    }
    
    public function calculateDistance(Point $point1, Point $point2)
    {
        $distance = 0;
        try {
            $distance = $this->distanceCalculator->calculateDistance($point1, $point2);
        } catch (Exception $ex) {

        }
        return $distance;
    }
}
