<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

use app\models\Point;
/**
 *
 * @author Evgeniy
 */
interface DistanceCalculatorInterface
{
    public function calculateDistance(Point $point1, Point $point2);
}
