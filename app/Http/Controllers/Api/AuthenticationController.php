<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ManagesResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

/**
 * @group Authentication
 *
 * API for handling User Authentication
 */
class AuthenticationController extends Controller
{
    use ManagesResponse;

    /**
     * detect the username between phone and email
     * @param $input
     * @return string
     */
    private function username($input)
    {
        if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } else {
            return 'phone';
        }
    }

    /**
     * Register user
     *
     * log in user after registration and return token with other user details
     *
     * @bodyParam name string required The name of the user
     * @bodyParam email string required The email of the user which must be unique. e.g me@example.com
     * @bodyParam phone string required The phone number of the user which must be unique. e.g 07012345678
     * @bodyParam password string required The password of the user. must be min of 6 characters
     * @response {
     * "success": true,
     * "data": {
     * "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTRjNmEyNi1lMTNhLTRkOGQtOTU2MC00NmZhZjRhNTllYmUiLCJqdGkiOiIwMGUyMzZiN2JmZDNkNTJiNDZiNThmNzJkOTVhMGVhNTY4NTMxOTNlZmFmYzk1OTRjY2ExZjMzOGZlOGM4OGM1OWYyMTc0NzkzMzYxNDg2OCIsImlhdCI6MTY0MTU1NTQ5My4yNjE2NiwibmJmIjoxNjQxNTU1NDkzLjI2MTY2NCwiZXhwIjoxNjQyMDczODkzLjI1OTg2Niwic3ViIjoiNjMwZmQzZGMtYmVhNC00MzdkLWI3Y2MtYjNjOGVhZDUzMjM2Iiwic2NvcGVzIjpbXX0.HsIn2YHEoWvC7dhLatfNEDHP66vJb8kONpDjT4AFJcOFqowPJ-uH-GzN-7UMzcQ5FKt87O2Dzx02iOZflBjwuS9mjfyxeNsk-KNwEeMlte-f55KEGQvt0KSkV0TGz-3hyLk0BdWHxsSxhjOEq0SXHmrGgR5_EJP-dIpokOOA8O70R7qrgV7yHEhuIqYGr92wVUphNyHEtoZ6U4mHFGAgPm9POn17lYjwnRLylx41bYHncGW6s9StlOzhyOl2FIY1vgobu6hHtt9KA9kow2aKupt7C3YiknDyvSpcJk3DplfVOrT-7buN_mDt4wsfRFFrx2XxUGgwU9ERPbDUfIp__b12nk51vhJ1ZyRbYmLEkDGkqHpGtHU69YbfrJD2Ep4BIL2ZwK1_LTNBJF-IaoxStZqgnjowpVrxDshgUM6LkJANjDfwRLp-T1HQ1Ui1fCdP-6OYNlrE-J2vGnZNAp8PWxs--X7Rq1jamc4A9TIu6xcPoXYdKkTxIxFz5WxfHrSch-4pDHashzUvgDSbtPEEJmhexIsayn-_0rgyTbOBrIs1GiFv8tsT0CH_Vrlr7euFdEBiKWLffA-Asmy7Q7GOOtRHIpW9WY6EvSjtEKBxOBXhmB6Ee_ocor26VJfRyTVnOdhrvkjZ44oQo6jlMSOAXGXJOqsCVOpfKJgShjfVdL8",
     * "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
     * "name": "Lubem Tser",
     * "email": "enginlubem@ymail.com",
     * "phone": "08038602189"
     * },
     * "message": "user created successfully.",
     * "status": "success"
     * }
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:75',
            'email' => 'required|email|max:70|unique:users',
            'phone' => 'required|string|max:18|unique:users',
            'password' => 'required|string|min:6'
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation error', $validator->errors(), 422);
        }

        try {
            $inputs = $request->only(['name', 'email', 'phone']);
            $inputs['password'] = bcrypt($request->get('password'));
            $user = User::create($inputs);

            if (!empty($user)) {
                \auth()->login($user);
                $success['token'] =  $user->createToken(uniqid())->accessToken;
                $success['id'] =  $user->id;
                $success['name'] =  $user->name;
                $success['email'] =  $user->email;
                $success['phone'] = $user->phone;

                return $this->sendResponse($success, 'user created successfully.');
            }
            return $this->sendError('unable to create user');
        }catch (\Exception $exception) {
            return $this->sendError('exception error', $exception->getMessage(), '502');
        }
    }

    /**
     * Login user
     *
     * login attempt into the platform
     *
     * @bodyParam username string required The username of the user. either email or phone number can be used as username.
     * @bodyParam password string required The password of the user.
     * @response {
     * "success": true,
     * "data": {
     * "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTRjNmEyNi1lMTNhLTRkOGQtOTU2MC00NmZhZjRhNTllYmUiLCJqdGkiOiIwMGUyMzZiN2JmZDNkNTJiNDZiNThmNzJkOTVhMGVhNTY4NTMxOTNlZmFmYzk1OTRjY2ExZjMzOGZlOGM4OGM1OWYyMTc0NzkzMzYxNDg2OCIsImlhdCI6MTY0MTU1NTQ5My4yNjE2NiwibmJmIjoxNjQxNTU1NDkzLjI2MTY2NCwiZXhwIjoxNjQyMDczODkzLjI1OTg2Niwic3ViIjoiNjMwZmQzZGMtYmVhNC00MzdkLWI3Y2MtYjNjOGVhZDUzMjM2Iiwic2NvcGVzIjpbXX0.HsIn2YHEoWvC7dhLatfNEDHP66vJb8kONpDjT4AFJcOFqowPJ-uH-GzN-7UMzcQ5FKt87O2Dzx02iOZflBjwuS9mjfyxeNsk-KNwEeMlte-f55KEGQvt0KSkV0TGz-3hyLk0BdWHxsSxhjOEq0SXHmrGgR5_EJP-dIpokOOA8O70R7qrgV7yHEhuIqYGr92wVUphNyHEtoZ6U4mHFGAgPm9POn17lYjwnRLylx41bYHncGW6s9StlOzhyOl2FIY1vgobu6hHtt9KA9kow2aKupt7C3YiknDyvSpcJk3DplfVOrT-7buN_mDt4wsfRFFrx2XxUGgwU9ERPbDUfIp__b12nk51vhJ1ZyRbYmLEkDGkqHpGtHU69YbfrJD2Ep4BIL2ZwK1_LTNBJF-IaoxStZqgnjowpVrxDshgUM6LkJANjDfwRLp-T1HQ1Ui1fCdP-6OYNlrE-J2vGnZNAp8PWxs--X7Rq1jamc4A9TIu6xcPoXYdKkTxIxFz5WxfHrSch-4pDHashzUvgDSbtPEEJmhexIsayn-_0rgyTbOBrIs1GiFv8tsT0CH_Vrlr7euFdEBiKWLffA-Asmy7Q7GOOtRHIpW9WY6EvSjtEKBxOBXhmB6Ee_ocor26VJfRyTVnOdhrvkjZ44oQo6jlMSOAXGXJOqsCVOpfKJgShjfVdL8",
     * "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
     * "name": "Lubem Tser",
     * "email": "enginlubem@ymail.com",
     * "phone": "08038602189"
     * },
     * "message": "user logged in successfully.",
     * "status": "success"
     * }
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('validation error.', $validator->errors(), 422);
        };

        try {
            if (\auth()->attempt([$this->username($request->get('username')) => $request->get('username'), 'password' => $request->get('password')])) {
                $user = \auth()->user();
                $success['token'] = $user->createToken(uniqid())->accessToken;
                $success['id'] = $user->id;
                $success['name'] =  $user->name;
                $success['email'] = $user->email;
                $success['phone'] = $user->phone;

                return $this->sendResponse($success, 'user logged in successfully.');
            } elseif (User::where('email', $request->get('username'))->orWhere('phone', $request->get('username'))->exists()) {
                return $this->sendError( 'password did not match username', [], 404);
            } else {
                return $this->sendError('email or phone number does not exist', [], 404);
            }
        }catch (\Exception $exception) {
            return $this->sendError('exception error', $exception->getMessage(), 502);
        }
    }

    /**
     * Authenticated User
     *
     * get the authenticated user details on from the platform
     *
     * @response {
     * "success": true,
     * "data": {
     * "id": "630fd3dc-bea4-437d-b7cc-b3c8ead53236",
     * "name": "Lubem Tser",
     * "email": "enginlubem@ymail.com",
     * "phone": "08038602189",
     * "email_verified_at": null,
     * "created_at": "2022-01-07T11:18:39.000000Z",
     * "updated_at": "2022-01-07T11:18:39.000000Z"
     * },
     * "message": "logged user retrieved successfully",
     * "status": "success"
     * }
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        try {
            if (\auth()->check()) {
                return $this->sendResponse(\auth()->user(), 'logged user retrieved successfully');
            }
            return $this->sendError('user not logged in');
        }catch (\Exception $exception) {
            return $this->sendError('exception error', $exception->getTrace(), 502);
        }
    }

    /**
     * LogOut User
     *
     * log out a user from the platform
     *
     * @response {
     * "success": true,
     * "data": null,
     * "message": "user logged out successfully",
     * "status": "success"
     * }
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        try{
            if (\auth()->check()) {
                $token = \auth()->user()->token();
                $token->revoke();
                return $this->sendResponse(null, 'user logged out successfully');
            }
            else{
                return $this->sendError('user not authenticated', ['error' => 'Unauthorised'] , Response::HTTP_UNAUTHORIZED);
            }

        }catch (\Exception $exception) {
            return $this->sendError('exception error', $exception->getMessage(), 502);
        }
    }
}
