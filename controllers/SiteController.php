<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use app\models\Url;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $model = new Url;

        if ($model->load(Yii::$app->request->post()))
            $model->save();

        return $this->render('index', ['model' => $model]);
    }

    public function actionRedirect($token)
    {
        if (!$originalUrl = Url::getOriginalUrl($token))
            throw new NotFoundHttpException;

        return $this->redirect($originalUrl);
    }
}
