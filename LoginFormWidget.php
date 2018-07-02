<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\models\LoginForm;
use app\models\SignupForm;

/**
 * Class LoginFormWidget
 * @package app\widgets
 */
class LoginFormWidget extends Widget
{
    /**
     * @return string|void
     */
    public function run()
    {
        if (Yii::$app->user->isGuest) {
            $loginModel = new LoginForm();
            $signupModel = new SignupForm();
            echo $this->render('loginFormWidget', [
                'loginModel' => $loginModel,
                'signupModel' => $signupModel,
            ]);
        }
    }
}
