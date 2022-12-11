<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use app\Service\UserGroupShowService;
use app\Service\UserGroupShowIsNotService;
use app\Service\UserGroupCreateService;
use app\Service\UserGroupRemoveService;

class UserGroupController extends \yii\rest\Controller
{
    public $enableCsrfValidation = false;
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        // $behaviors['authenticator'] = [
        //     'class' => JwtHttpBearerAuth::class,
        // ];
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Origin' => ['*'],
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Request-Methods' => ['POST', 'GET', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Max-Age' => 3600,
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Headers' => ['X-Requested-With', 'Content-Type', 'Accept', 'Authorization'],
                #'Access-Control-Expose-Headers' => ['*'],
            ],
        ];
        return $behaviors;
    }

    public function actionShow()
    {
        $service = new UserGroupShowService();
        return $this->asJson(array( 
            $service->show(Yii::$app->request)
        ));
    }

    public function actionNot()
    {
        $service = new UserGroupShowIsNotService();
        return $this->asJson(array( 
            $service->show(Yii::$app->request)
        ));
    }

    public function actionCreate()
    {
        $service = new UserGroupCreateService();
        return $this->asJson(array( 
            $service->create(Yii::$app->request)
        ));
    }

    public function actionRemove()
    {
        $service = new UserGroupRemoveService();
        return $this->asJson(array( 
            $service->remove(Yii::$app->request)
        ));
    }
}