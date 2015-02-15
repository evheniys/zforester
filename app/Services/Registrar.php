<?php namespace App\Services;

use App\User;
use App\UserLog;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use App\TurboSms\TurboSms;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'phonenumber' => 'required|max:13|unique:users',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$sms = new TurboSms();
		$sms_text = 'Ваш пароль на доступ к сайту: '.'"'.$data['password'].'"';
		$sms->send($sms_text,$data['phonenumber']);
		$user = User::create([
			'phonenumber' => $data['phonenumber'],
			'password' => bcrypt($data['password']),
			'status' => 1,
		]);
		$userlog['userid'] = $user->id;
		$userlog['activity'] = 1;
		$userlog['ipaddress'] = $data['ip'];
		UserLog::create($userlog);

		return $user;
	}

}
