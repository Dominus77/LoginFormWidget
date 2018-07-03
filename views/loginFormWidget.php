<?php

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $loginModel app\models\LoginForm
 * @var $signupModel app\models\SignupForm
 */

use yii\helpers\Html;
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
    'header' => Html::tag('h4', Yii::t('app', 'Login'), []),
    'id' => 'login-modal',
]); ?>

<p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

<?= $this->render('_loginForm', [
    'model' => $loginModel
]) ?>

<?php Modal::end(); ?>
<!-- ******* Конец Модальное окно аутентификации ******* -->

<!-- ******* Начало Модальное окно регистрации ******* -->
<?php Modal::begin([
    'header' => Html::tag('h4', Yii::t('app', 'Sign Up'), []),
    'id' => 'signup-modal',
]); ?>

<p><?= Yii::t('app', 'Please fill in the following fields to sign up:'); ?></p>

<?= $this->render('_signupForm', [
    'model' => $signupModel
]) ?>

<?php Modal::end(); ?>
<!-- ******* Конец Модальное окно регистрации ******* -->
