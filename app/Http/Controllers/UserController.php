<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\UserFormRequest;
use App\Repositories\UserRepository;
use App\Services\Factory\EntityFactory;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 *
 * @package    App\Http\Controllers
 * @subpackage App\Http\Controllers\UserController
 */
class UserController extends Controller
{

    /**
     * @var Guard
     */
    protected $auth;

    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * Constructor.
     *
     * @param Guard  $auth
     * @param UserRepository $users
     */
    public function __construct(Guard $auth, UserRepository $users)
    {
        $this->auth  = $auth;
        $this->users = $users;
    }
    
    /**
     * @return mixed
     */
    public function create()
    {
        return view('user/create', []);
    }

    /**
     * @param EntityFactory   $factory
     * @param UserFormRequest $request
     *
     * @return mixed
     */
    public function store(EntityFactory $factory, UserFormRequest $request)
    {
        $user = $factory->createUser(
            $request->input('username'),
            $request->input('email'),
            bcrypt($request->input('password'))
        );

        $this->users->save($user);

        return redirect()->route('user.login');
    }

    /**
     * @return mixed
     */
    public function account()
    {
        $user = $this->auth->user();

        return view('user/update', [
            'user' => $user,
        ]);
    }

    /**
     * @param UserFormRequest $request
     *
     * @return mixed
     */
    public function update(UserFormRequest $request)
    {
        /** @var User $user */
        $user = $this->auth->user();
        $user->setPassword(bcrypt($request->input('password')));

        $this->users->save($user);

        return redirect()->route('user.account.show')->with('success', 'Password Updated');
    }
    
    /**
     * @return mixed
     */
    public function login()
    {
        return view('user/login');
    }

    /**
     * @param LoginFormRequest $request
     *
     * @return mixed
     */
    public function postLogin(LoginFormRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::guard()->attempt($credentials, $request->has('remember'))) {
            return redirect()->route('index')->with('success', 'Welcome back');
        }

        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors([
                'username' => 'These credentials do not match our records.',
            ]);
    }

    /**
     * @return mixed
     */
    public function logout()
    {
        Auth::guard()->logout();

        return redirect()->route('index');
    }
}
