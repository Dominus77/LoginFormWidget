<?php

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $loginModel app\models\LoginForm
 * @var $signupModel app\models\SignupForm
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;

$script = "
    $('#signnup-link').click(function(e) {
        e.preventDefault();
        $('#login-modal').modal('hide'); // Скрываем аутентификацию
        $('#signup-modal').modal('show'); // Открываем регистрацию
    });
";

$this->registerJs($script);
?>
<!-- ******* Начало Модальное окно аутентификации ******* -->
<?php Modal::begin([
    'header' => '<h4>Login</h4>',
    'id' => 'login-modal',
]);
?>

<p>Please fill out the following fields to login:</p>

<?php $form = ActiveForm::begin([
    'id' => 'login-form',
    'enableAjaxValidation' => true,
    'action' => ['/site/ajax-login']
]); ?>

<?= $form->field($loginModel, 'email')->textInput([
    'placeholder' => true
]); ?>

<?= $form->field($loginModel, 'password')->passwordInput([
    'placeholder' => true
]); ?>

<?= $form->field($loginModel, 'rememberMe')->checkbox(); ?>

<div>
    If you forgot your password you can <?= Html::a('reset it', ['/site/request-password-reset']) ?>.
</div>

<div class="form-group">
    <div class="text-right">
        <?= Html::button(Yii::t('app', 'Cancel'), [
            'class' => 'btn btn-default',
            'data-dismiss' => 'modal'
        ]) ?>
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
Modal::end(); ?>
<!-- ******* Конец Модальное окно аутентификации ******* -->


<!-- ******* Начало Модальное окно регистрации ******* -->
<?php
Modal::begin([
    'header' => '<h4>Sign Up</h4>',
    'id' => 'signup-modal',
]); ?>

<?php $form = ActiveForm::begin([
    'id' => 'signup-form',
    'enableAjaxValidation' => true,
    'action' => ['/site/ajax-signup']
]); ?>

<p><?= Yii::t('app', 'Please fill in the following fields to sign up'); ?>:</p>


<?= $form->field($signupModel, 'username')->textInput([
    'placeholder' => true
]) ?>

<?= $form->field($signupModel, 'email')->textInput([
    'placeholder' => true
]) ?>

<?= $form->field($signupModel, 'password')->passwordInput([
    'placeholder' => true
]) ?>

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
Modal::end(); ?>
<!-- ******* Конец Модальное окно регистрации ******* -->
