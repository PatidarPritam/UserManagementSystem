<?php

namespace App\Http\Controllers\Api;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /* Register for new user */
      /**
     * @param App\Requests\RegisteRequests $request // it is just for informationr
     * @return JSONResponse
     */

    public function register(RegisterRequest $request){
        
          // dd($request->all());

      try{
           $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
          //  'password' => bcrypt($request->password),
          'password' => Hash::make($request->password),
          'phone_number' => $request->phone_number,
            ]);

            if($user){
              return  ResponseHelper::success(message:'user has been registered successfully', data:$user, statusCode:201);
            }
             return  ResponseHelper::error(message:'unable to register user! Please try again', statusCode:400);
                 
        }

      catch(\Exception $e){
        //return $e->getMessage();
       Log::error('unable to register user :' . $e->getMessage() .' -Line no. ' .$e->getLine());
        return  ResponseHelper::error(message:'unable to register user! Please try again' .$e->getMessage() , statusCode:500);

         }
       
          
    }
   
    /*  Login User    */
    /**
     * @param App\Requests\LoginRequests $request // it is just for information
     */

    public function login(LoginRequest $request)
    {

       //  dd($request->all());

    /*    if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            return ResponseHelper::success(message:'User has been logged in successfully',data:$user, statusCode:200);
        } else {
            return ResponseHelper::error(message:'Invalid credentials', statusCode:401);
        } */

               try{
              //  dd(Auth::attempt(['email'=> $request->email,'password'=> $request->password]));
               if(!Auth::attempt(['email'=> $request->email,'password'=> $request->password])){
                return  ResponseHelper::error(message:'unable to login user! due to invalid credentials ', statusCode:400);
               }
               $user = Auth::user();
              // dd($user);

                 // create Api token
             $token = $user->createToken('My Api Token')->plainTextToken;
              $authUser=[
                'user' => $user,
                'token' => $token
              ];
              
            return  ResponseHelper::success(message:'you are logged in successfully', data:$authUser, statusCode:201);

               }
               catch(\Exception $e){
                //return $e->getMessage();
               Log::error('unable to login  user :' . $e->getMessage() .' -Line no. ' .$e->getLine());
                return  ResponseHelper::error(message:'unable to register user! Please try again' .$e->getMessage() , statusCode:500);
        
                 }
        


      }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
