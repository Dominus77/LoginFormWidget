# LoginFormWidget for Yii2

Виджет форм аутентификации и регистрации в модальном окне.

### Использование
1. Содержимое закинуть в папку widgets, в корне проекта
```
app\widgets
```
2. Добавить в контроллер два метода для ajax проверки форм
```
public function actionAjaxLogin()
{
    if (Yii::$app->request->isAjax) {
        $model = new \app\models\LoginForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->login()) {
                return $this->goBack();
            } else {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            }
        }
    }
    throw new \yii\web\NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
}

public function actionAjaxSignup()
{
    if (Yii::$app->request->isAjax) {
        $model = new \app\models\SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->signup()) {
                return $this->goBack();
            } else {
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return \yii\widgets\ActiveForm::validate($model);
            }
        }
    }
    throw new \yii\web\NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
}    
```
3. Заменить ссылку Login в меню главного шаблона
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
Обратить внимание на атрибуты форм, поставить нужные, в текущем варианте `username` и 
`password` для формы авторизации, `username`, и `password`, для регистрации.
 
Ссылки по умолчанию ведут на контроллер SiteController.

Добавить правила роутинга, если нужно, для действий `ajax-login` и `ajax-signup` в текущем варианте они выглядят так:
```
'ajax-login' => 'site/ajax-login',
'ajax-signup' => 'site/ajax-signup',
```

На этом подключение завершено, можно пробовать.
