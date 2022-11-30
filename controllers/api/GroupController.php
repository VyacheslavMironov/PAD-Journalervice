<?php

namespace app\controllers\api;

use Yii;
use yii\filters\Cors;
use app\Service\GroupCreateService;

class GroupController extends \yii\rest\Controller{
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

    public function actionCreate()
    {
        $service = new GroupCreateService();
        return $this->asJson(array(
            $service->create(Yii::$app->request)
        ));
    }

    public function actionShow()
    {
        return $this->asJson(array( 123 ));
    }
}