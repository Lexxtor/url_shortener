<?php

/* @var $this yii\web\View */
/* @var $model app\models\Url */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\widgets\Pjax;

$this->title = 'URL shortener';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?=$this->title?></h1>

        <?php Pjax::begin(['enablePushState' => false])?>
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            'options' => [
                'data-pjax' => 1,
            ],
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-md-2',
                    'wrapper' => 'col-md-10',
                ],
            ],
        ])?>
        <?= $form->field($model, 'url') ?>
        <div class="form-group">
            <?= Html::submitButton('Shorten', ['class' => 'btn btn-success']) ?>
        </div>

        <?php if (!$model->isNewRecord) {?>
        <?= $form->field($model, 'shortUrl')->input('text', ['readonly'=>'readonly']) ?>
        <?php } ?>


        <?php $form->end()?>

        <?php Pjax::end()?>
    </div>

</div>
