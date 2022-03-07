<?php
namespace controllers;
use models\Organization;
use models\User;
use Ubiquity\orm\DAO;
use Ubiquity\utils\flash\FlashMessage;
use Ubiquity\utils\http\USession;
use Ubiquity\utils\http\URequest;


class MyAuth extends \Ubiquity\controllers\auth\AuthController{

	protected function onConnect($connected) {
		$urlParts=$this->getOriginalURL();
		USession::set($this->_getUserSessionKey(), $connected);
		if(isset($urlParts)){
			$this->_forward(implode("/",$urlParts));
		}else{
			//TODO
			//Forwarding to the default controller/action
		}
	}

	protected function _connect() {
		if(URequest::isPost()){
			$email=URequest::post($this->_getLoginInputName());
			$password=URequest::post($this->_getPasswordInputName());
			$user=DAO::getOne(User::class,"email= ?",false,[$email]);
            if($user != null){
                if(URequest::password_verify('password',$user->getPassword()))
                    return $user;
                if($user->getPassword() === $password){
                    return $user;
                }
            }
		}
	}
	
	/**
	 * {@inheritDoc}
	 * @see \Ubiquity\controllers\auth\AuthController::isValidUser()
	 */
	public function _isValidUser($action=null): bool {
		return USession::exists($this->_getUserSessionKey());
	}

	public function _getBaseRoute(): string {
		return 'MyAuth';
	}

    public function hasAccountCreation(): bool
    {
        return true;
    }

    public function _newAccountCreationRule(string $accountName): ?bool
    {
        return true;//(array($accountName,['admin','root']) == false);
    }

    protected function _create(string $login, string $password): ?bool
    {
        if(!DAO::exists(User::class,'email= ?',[$login])){
            $user=new User();
            $user->setEmail($login);
            $user->setPassword(password_hash($password,PASSWORD_DEFAULT));
            $user->setOrganization(DAO::getById(Organization::class,1));
            DAO::insert($user);
        }
        return false;
    }

    protected function createAccountMessage(FlashMessage $fMessage)
    {
        $account=URequest::post('login');
        $fMessage->setContent("$account créé avec succès !");
    }

    public function _displayInfoAsString(): bool
    {
        return true;
    }
    protected function noAccessMessage(FlashMessage $fMessage)
    {
        $fMessage->setTitle('Accès interdit');
        $fMessage->setContent("cette zone ne vous est pas autorizer");

    }
}
