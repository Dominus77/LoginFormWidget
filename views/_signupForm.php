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
<?= $form->field($model, 'email')->textInput([
    'placeholder' => true
]) ?>
<?= $form->field($model, 'password')->passwordInput([
    'placeholder' => true
]) ?>
    <hr>
    <div class="form-group">
        <div class="text-right">
            <?= Html::button(Yii::t('app', 'Cancel'), [
                'class' => 'btn btn-default',
                'data-dismiss' => 'modal'
            ]) ?>
            <?= Html::submitButton(Yii::t('app', 'Sign Up'), [
                'class' => 'btn btn-primary',
                'name' => 'signup-button'
            ]) ?>
        </div>
    </div>
<?php ActiveForm::end();
