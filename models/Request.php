<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;

use yii\base\Model;
use yii\helpers\ArrayHelper;

/**
 * Description of Route
 *
 * @author Evgeniy
 */
class Request extends Model
{
	public $cities = [];
	
	public function rules()
	{
		return [
            ['cities','validateCities'],
			['cities', 'each', 'rule' => ['in', 'range' =>$this->cities()]]
		];
	}
    
    public function cities()
    {
        return City::find()->select('name')->asArray()->column();
    }
    
    public function validateCities($attribute,$params)
    {
        if (!is_array($this->cities)) {
            $this->addError('cities', "$cities must be array");
            return;
        }
        if (count($this->cities) < 2) {
            $this->addError('cities', 'At least 2 cities reqiured');
        }
    }
}
