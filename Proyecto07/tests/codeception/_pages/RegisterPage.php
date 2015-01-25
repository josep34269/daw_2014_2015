<?php

namespace tests\codeception\_pages;

use yii\codeception\BasePage;

/**
 * Represents login page
 * @property \AcceptanceTester|\FunctionalTester $actor
 */
class RegisterPage extends BasePage
{
    public $route = 'site/register';

    /**
     * @param string $username
     * @param string $password
     */
    public function login($username, $password, $name, $lastname)
    {
        $this->actor->fillField('input[name="RegisterForm[username]"]', $username);
        $this->actor->fillField('input[name="RegisterForm[password]"]', $password);
		$this->actor->fillField('input[name="RegisterForm[username]"]', $name);
		$this->actor->fillField('input[name="RegisterForm[username]"]', $lastname);
        $this->actor->click('register-button');
    }
}
