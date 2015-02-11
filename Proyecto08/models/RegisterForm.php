<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * RegisterForm is the model behind the register form.
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
	public $email;
	public $phone;
	public $address;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are required
            [['username', 'password', 'email', 'phone', 'address'], 'required'],
			// username and email are unique
            [['username', 'email'], 'unique'],
			// email
			[['email'], 'email'],
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
			'email' => 'E-mail',
			'phone' => 'Teléfono',
			'address' => 'Dirección',
        ];
    }
	
	public function register()
	{
		$db = Yii::$app->db;
		$numUser=$this->validateUsername($db);
		$numMail=$this->validateEmail($db);
		
		if($numUser['Total']>0){
			 $this->addError('username', 'El usuario ya existe');
		}else if($numMail['Total']>0){
			 $this->addError('email', 'El e-mail ya existe');
		}else{
			$this->password=md5($this->password);
			$db->createCommand()->insert('usuarios', [
				'nombre_usuario' => $this->username,
				'contraseña' => $this->password,
				'telefono_usuario' => $this->phone,
    			'email_usuario' => $this->email,
				'direccion' => $this->address,
			])->execute();
			return true;
		}
	}
	
	private function validateUsername($db)
    {
        if (!$this->hasErrors()) {
            $posts = $db->createCommand("SELECT COUNT(*) AS Total FROM usuarios WHERE nombre_usuario='".$this->username."';")->queryOne();
			return $posts;
        }
    }
	
	private function validateEmail($db)
    {
        if (!$this->hasErrors()) {
            $posts = $db->createCommand("SELECT COUNT(*) AS Total FROM usuarios WHERE email_usuario='".$this->email."';")->queryOne();
			return $posts;
        }
    }
	
}
