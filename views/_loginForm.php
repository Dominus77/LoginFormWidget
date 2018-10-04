<?php

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $model app\models\LoginForm
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'action' => ['/site/ajax-login']
]); ?>
<?= $form->field($model, 'username')->textInput([
    'placeholder' => true
]); ?>
<?= $form->field($model, 'password')->passwordInput([
    'placeholder' => true
]); ?>
<?= $form->field($model, 'rememberMe')->checkbox(); ?>

    <hr>
    <div class="form-group">
        <div class="text-right">
            <?= Html::submitButton(Yii::t('app', 'Login'), [
                'class' => 'btn btn-primary',
                'name' => 'login-button'
            ]) ?>
            <?= Html::a(Yii::t('app', 'Sign Up'), ['/#'], [
                'id' => 'signnup-link',
                'class' => 'btn btn-success'
            ]) ?>
        </div>
    </div>
<?php ActiveForm::end();
