# LoginFormWidget for Yii2

Виджет Форм Аутентификации и Регистрации в модальном окне.

### Подключение
1. Содержимое закинуть в папку widgets, в корне проекта
```
app\widgets
```
2. Добавить в SiteController два метода для ajax проверки форм
```
<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoginForm;
use app\models\SignupForm;
use yii\web\NotFoundHttpException;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends Controller
{
    //...
    
    /**
     * @return array|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionAjaxLogin()
    {
        if (Yii::$app->request->isAjax) {
            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->login()) {
                    return $this->goBack();
                } else {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validate($model);
                }
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    /**
     * @return array|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\base\Exception
     */
    public function actionAjaxSignup()
    {
        if (Yii::$app->request->isAjax) {
            $model = new SignupForm();
            if ($model->load(Yii::$app->request->post())) {
                if ($model->signup()) {
                    return $this->goBack();
                } else {
                    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                    return \yii\widgets\ActiveForm::validate($model);
                }
            }
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    //...
}
```
3. Заменить ссылку Login в главном шаблоне
```
$menuItems[] = ['label' => 'Login','url' => ['/site/login']];
```
на
```
$menuItems[] = ['label' => Yii::t('app', 'Login'),'url' => '#','options' => [
                'data' => [
                    'toggle' => 'modal',
                    'target' => '#login-modal',
                ],
            ]
        ];
```
4. Подключить виджет в главном шаблоне
```
//...
<?php $this->beginBody() ?>
// Подключаем виджет
<?= app\widgets\LoginFormWidget::widget() ?>
//...
```
На этом подключение завершено, можно пробовать.
