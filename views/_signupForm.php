<?php

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $model app\models\SignupForm
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'enableAjaxValidation' => true,
    'action' => ['/site/ajax-signup']
]); ?>
<?= $form->field($model, 'username')->textInput([
    'placeholder' => true
]) ?>
<?= $form->field($model, 'password')->passwordInput([
    'placeholder' => true
]) ?>
    <hr>
    <div class="form-group">
        <div class="text-right">
            <?= Html::a(Yii::t('app', 'Cancel'), ['/#'], [
                'id' => 'signnup-back-link',
                'class' => 'btn btn-default'
            ]) ?>
            <?= Html::submitButton(Yii::t('app', 'Sign Up'), [
                'class' => 'btn btn-primary',
                'name' => 'signup-button'
            ]) ?>
        </div>
    </div>
<?php ActiveForm::end();
