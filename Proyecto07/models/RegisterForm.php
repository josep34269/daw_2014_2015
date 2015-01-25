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
	public $name;
	public $lastname;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'name', 'lastname'], 'required'],
			// username is unique
            [['username'], 'unique'],
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
			'name' => 'Nombre',
			'lastname' => 'Apellidos',
        ];
    }
	
	public function register()
	{
		$db = Yii::$app->db;
		$numUser=$this->validateUsername($db);
		
		if($numUser['Total']>0){
			 $this->addError('username', 'El usuario ya existe');
		}else{
			$this->password=md5($this->password);
			$db->createCommand()->insert('usuarios', [
				'usuario' => $this->username,
				'password' => $this->password,
    			'nombre' => $this->name,
    			'apellidos' => $this->lastname,
			])->execute();
			return true;
		}
	}
	
	private function validateUsername($db)
    {
        if (!$this->hasErrors()) {
            $posts = $db->createCommand("SELECT COUNT(*) AS Total FROM usuarios WHERE usuario='".$this->username."';")->queryOne();
			return $posts;
        }
    }
	
}
