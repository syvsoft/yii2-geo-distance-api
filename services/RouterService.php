<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\services;

use app\interfaces\GeoLocatorInterface;
use app\interfaces\DistanceCalculatorInterface;
use app\models\Request;
use app\models\Route;
use app\models\Point;

/**
 * Description of RouterService
 *
 * @author Evgeniy
 */
class RouterService
{
    private $geoLocator;
    private $distanceCalculator;
    
    public function __construct(DistanceCalculatorInterface $distanceCalculator, GeoLocatorInterface $geoLocator = null)
    {
        $this->geoLocator = $geoLocator;
        $this->distanceCalculator = $distanceCalculator;
    }
    
    public function createRouteFromRequest(Request $request)
    {
        $route = new Route($this->distanceCalculator);
        foreach ($request->cities as $city) {
            $coordinates = null;
            if ($this->geoLocator) {
                $coordinates = $this->geoLocator->getCoordinatesByAddress($city);
            }
            $route->addPoint(new Point($city, $coordinates));
        }
        return $route;
    }
    
    public function processRequest(Request $request)
    {
        $route = $this->createRouteFromRequest($request);
        $result = [
            'route' => $route->__tostring(),
            'distance' => $route->getDistance()
        ];
        foreach ($route->split() as $segment){
            $result['routes'][] = [
                'route' => $segment->__tostring(),
                'distance' => $segment->getDistance()
            ];
        }
        return $result;
    }
}
