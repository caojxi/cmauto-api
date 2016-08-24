<?php

namespace Cmauto\Http\Controllers\Auth;

use Cmauto\User\UserTransformer;
use Illuminate\Http\Request;
use Cmauto\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;

class AuthController extends Controller
{
    protected $manager;

    public function __construct(Manager $manager)
    {
        $this->manager = $manager;
    }

    public function me()
    {
        return response()->json(['user' => $this->transformUser(JWTAuth::parseToken()->authenticate())]);
    }

    public function authenticate(Request $request)
    {
        $return = [];

        // grab credentials from the request
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        $return['token'] = $token;
        $return['user'] = $this->transformUser(\Auth::user());

        return response()->json($return);
    }

    private function transformUser($user)
    {
        $user = new Item($user, new UserTransformer());

        return $this->manager->createData($user)->toArray();
    }
}
