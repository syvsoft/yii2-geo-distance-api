<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\controllers;

use Yii;
use yii\rest\Controller;
use app\models\Request;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use app\models\Route;

/**
 * Description of ApiController
 *
 * @author Evgeniy
 */
class ApiController extends Controller
{
    
    private $routerService;
    
    public function __construct($id, $module, $config = [],\app\services\RouterService $routerService)
    {
        $this->routerService = $routerService;
        parent::__construct($id, $module, $config);
    }
    
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
        return $behaviors;
    }
    
    public function actionIndex()
    {
        return ['result' => 'ok'];
    }

    public function actionRoute()
    {
        $cities = $_GET['c'];
        $request = new Request;
        $request->cities = preg_split('/[\s\,]+/', $cities);
        if (!$request->validate()) {
            throw new \yii\web\BadRequestHttpException($request->getFirstError('cities'));
        }
        return $this->routerService->processRequest($request);
    }
    
    public function verbs()
    {
        return [
            'route' => ['post', 'get']
        ];
    }
    
    public function actionError()
    {
        
    }

}
