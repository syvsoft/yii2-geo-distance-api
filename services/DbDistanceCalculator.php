<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\interfaces\DistanceCalculatorInterface;
use app\models\Distance;
use app\models\Point;
use app\models\City;

/**
 * Description of DbDistanceCalculator
 *
 * @author Evgeniy
 */
class DbDistanceCalculator implements DistanceCalculatorInterface
{
    public function calculateDistance(Point $point1, Point $point2)
    {
        $id1 = $this->getPointIdByName($point1->getName());
        $id2 = $this->getPointIdByName($point2->getName());
        
        $distance = Distance::find()->where('from_city=:city1 and to_city=:city2')
                ->orWhere('to_city=:city1 and from_city=:city2')
                ->params([
                    ':city1' => $id1,
                    ':city2' => $id2
                ])
                ->one();
        if (!$distance) {
            throw new \yii\web\BadRequestHttpException("Distance between ".$point1 . ' and '. $point2." cannot be calculated");
        }
        return $distance->distance;
    }
    
    protected function getPointIdByName($name)
    {
        return City::find()->select('id')->where('name=:name')->params(['name'=>$name])->scalar();
    }
}
