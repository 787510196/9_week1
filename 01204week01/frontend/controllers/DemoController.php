<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Biaoqian;
use frontend\models\User;
//\调用session
use Illuminate\Support\Facades\Session;


class DemoController extends Controller{

     public $enableCsrfValidation = false;//防csrf
     public $layout = false; //去除框架样式
    
    public function actionIndex()
    {
    	return $this->render('register');
    }
   
    public function actionIndex_add()
    { 
      //接表单传的值
      $post=Yii::$app->request->post(); 
      //print_r($post);die;
      if($post['password']!=$post['password1']){

      echo "<script>alert('两次密码不一致');location.href='?r=demo/index'</script>";
      }
      //开启session
      $session = Yii::$app->session;
      //把表单接的值传到$session里
      $session['captcha'] = [
      'phone' => $post['phone'],
      'password' => $post['password'],
      'password1' => $post['password1'],
      ];

      return $this->render('register_2');
    }
    //上一步的默认值界面
    public function actionIndex_value()
    {
      //开启session
      $session = Yii::$app->session;
      $phone=$session['captcha']['phone'];
      $password=$session['captcha']['password'];
      $password1=$session['captcha']['password1'];
      return $this->render('register.php',['phone'=>$phone,'password'=>$password,'password1'=>$password1]);

    }
    public function actionIndex_add1()
    {
       //接表单传的值
      $post=Yii::$app->request->post(); 
      //开启session
      $session = Yii::$app->session;
      $session['captcha1'] = [
      'username' => $post['username'],
      'birthday' => $post['birthday'],
      'work_address' => $post['work_address'],
      ];

       $model=new Biaoqian();
       $res=$model->find()->asArray()->all();
      return $this->render('register_3',['res'=>$res]);

    }
     //上一步的默认值界面
    public function actionIndex_value2()
    {
      //开启session
      $session = Yii::$app->session;
      $username=$session['captcha1']['username'];
      $birthday=$session['captcha1']['birthday'];
      $work_address=$session['captcha1']['work_address'];
      return $this->render('register_2',['username'=>$username,'birthday'=>$birthday,'work_address'=>$work_address]);

    }
    public function actionIndex_add2()
    { 
      $model=new User();
      //接表单传值
      $biaoqian=Yii::$app->request->post();
      $session = Yii::$app->session;
      $username=$session['captcha1']['username'];
      $birthday=$session['captcha1']['birthday'];
      $work_address=$session['captcha1']['work_address'];
      $phone=$session['captcha']['phone'];
      $password=$session['captcha']['password'];
      $model->phone=$phone;
      $model->username=$username;
      //$model->biaoqian_id=$biaoqian;
      $model->birthday=$birthday;
      $model->work_address=$work_address;
      $model->password=$password;
      $res=$model->save();
      
      if($res)
      {
        echo 1;
      }
    	
    }


}
