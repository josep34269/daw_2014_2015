<?php

namespace app\models;

use app\models\Usuarios;

class User extends \yii\base\Object implements \yii\web\IdentityInterface {
	
	public $id_usuario;
	public $usuario;
	public $password;
	public $nombre;
	public $apellidos;
	
	public $username;
	public $authKey;
	
	/**
	 * @inheritdoc
	 */
	public static function findIdentity($id) {
	    $posts = Usuarios::find()->where([
			"id_usuario" => $id,
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
		 	"usuario" => $username,
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
		return $this->id_usuario;
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
		return $this->password === $password;
	}
	
}