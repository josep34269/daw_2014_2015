<?php

namespace app\models;

use app\models\Usuarios;

class User extends \yii\base\Object implements \yii\web\IdentityInterface {
	
	public $Codigo_usuario;
	public $Nombre_usuario;
	public $Contraseña;
	public $Telefono_usuario;
	public $Email_usuario;
	public $Direccion;
	public $authKey;
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id) {
	    $posts = Usuarios::find()->where([
			"Codigo_usuario" => $id,
		])->one();
		if (!count($posts)) {
			return null;
		}
		return new static($posts);
	}
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentityByAccessToken($token, $type = null) {
		 $posts = Usuarios::find()->where([
		 	"accessToken" => $token,
		])->one();
		if (!count($posts)) {
			return null;
		}
		return new static($posts);
	}
	
	/**
	 * Finds user by username
	 *
	 * @param  string      $username
	 * @return static|null
	 */
	public static function findByUsername($username) {
		$posts = Usuarios::find()->where([
		 	"Nombre_usuario" => $username,
		])->one();
		if (!count($posts)) {
			return null;
		}
		return new static($posts);
	}
	
	/**
	 * @inheritdoc
	 */
	public function getId() {
		return $this->Codigo_usuario;
	}
	
	/**
	 * @inheritdoc
	 */
	public function getAuthKey() {
		return $this->authKey;
	}
	
	/**
	 * @inheritdoc
	 */
	public function validateAuthKey($authKey) {
		return $this->authKey === $authKey;
	}
	
	/**
	 * Validates password
	 *
	 * @param  string  $password password to validate
	 * @return boolean if password provided is valid for current user
	 */
	public function validatePassword($password) {
		return $this->Contraseña === $password;
	}
	
}