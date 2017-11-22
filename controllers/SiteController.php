<?php

namespace app\controllers;

use app\models\Services;
use app\models\User;
use app\models\UserServices;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex($filter = 'all')
    {

        if ($filter == 'active') {
            $services = Services::find()->where("max_order > orders AND date >= curdate()")->all();
        }elseif($filter == 'passed'){
            $services = Services::find()->where("date < curdate()")->all();
        }elseif($filter == 'busy'){
            $services = Services::find()->where("max_order <= orders")->all();
        }else {
            $services = Services::find()->all();
        }

        return $this->render('index',[
            'services' => $services,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new SignupForm();
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    public function actionService($id) {
        $service = Services::findOne($id);

        return $this->render("service",[
            "service" => $service
        ]);

    }
    public function actionMyservices(){
        if(!Yii::$app->user->isGuest) {
            $user = User::find()->where(['id'=>Yii::$app->user->id])->one();;

        }else {
            return $this->goBack();
        }

        $user_services = UserServices::find()->where(["userId"=>$user->id])->all();
        return $this->render('myservices',[
            'services'=>$user_services,
            'user' => $user,
        ]);
    }
}
