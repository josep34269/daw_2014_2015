<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
        ];
    }
	
	/**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
			'username' => 'Usuario',
			'password' => 'Contraseña',
			'rememberMe' => 'Recordarme',
        ];
    }
	
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    private function validatePassword($db)
    {
		if (!$this->hasErrors()) {
			$posts = $db->createCommand("SELECT COUNT(*) AS Total FROM usuarios WHERE nombre_usuario='".$this->username."' AND contraseña='".md5($this->password)."';")->queryOne();
			return $posts;
		}
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
		$db = Yii::$app->db;
		$numUser=$this->validateUsername($db);
		$numPass=$this->validatePassword($db);
		
		if($numUser['Total']<1){
			 $this->addError('username', 'Usuario incorrecto');
		}else if($numPass['Total']<1){
			$this->addError('password', 'Contraseña incorrecta');
		}else{
        	if ($this->validate()) {
				$cookie = new \yii\web\Cookie([
					'name' => 'usuario',
					'value' => $this->username,
					'expire' => $this->rememberMe ? time() + 3600*24*30 : time() + 0,
				]);
\yii::$app->response->cookies->add($cookie);
            	return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        	} else {
            	return false;
        	}
		}
    }
	
	private function validateUsername($db)
    {
		if (!$this->hasErrors()) {
			$posts = $db->createCommand("SELECT COUNT(*) AS Total FROM usuarios WHERE nombre_usuario='".$this->username."';")->queryOne();
			return $posts;
		}
    }
	
	/**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
