<?php namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use App\UserLog;

trait AuthenticatesAndRegistersUsers {

	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * The registrar implementation.
	 *
	 * @var Registrar
	 */
	protected $registrar;

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		return view('auth.register');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Foundation\Http\FormRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{

		$validator = $this->registrar->validator($request->all());



		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$req = $request->all();
		$t_pass=round(mt_rand(mt_rand(0, 10000), mt_rand(10000, 90000))*time()/M_PI);
		$t_pass = substr($t_pass,0,4);
		$req['password'] = $t_pass;
		//str_random(4);
		$req['ip'] = $request->ip();
		//$this->auth->login($this->registrar->create($req));
		$this->registrar->create($req);

		return redirect($this->redirectPath());
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogin()
	{
		return view('auth.login');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'phonenumber' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('phonenumber', 'password');
		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
            dd($this->auth->user());
            $userlog['userid'] = $user->id;
            $userlog['activity'] = 2;
            $userlog['ipaddress'] = $request->ip();
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'phonenumber' => 'These credentials do not match our records.',
					]);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();

		return redirect('/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
	}

}
