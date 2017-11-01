<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\interfaces;

/**
 *
 * @author Evgeniy
 */
interface GeoLocatorInterface
{
    public function getCoordinatesByAddress($address);
    public function getAddressByCoordinates(\app\models\Coordinates $coordinates) : \app\models\Coordinates;
}
