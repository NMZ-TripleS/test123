<?php
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/creatByUid', function (Request $request) {
    $request->validate([
        'uid' => 'required',
        'email'=>'required|unique:users',
        'phone'=>'nullable',
        'name'=>'required'
    ]);
    $user = User::where('uid', $request->uid)->first();
    if (! $user) {
        $newUser = new User(['name'=>$request->name,'email'=>$request->email,'password'=>'mobile','phone'=>$request->phone]);
        if($newUser->save()){
            $result = ["message"=>"User created successfully."];
            return json_encode($result);
        }else{
            $result = ["message"=>"User created fail."];
            return json_encode($result);
        }
    }
    return $user->createToken($request->device_name)->plainTextToken;
});
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/categories',function(Request $request){
        return Category::all();
    });
    Route::get('/books',function(Request $request){
        return Book::all();
    })->middleware('auth:sanctum');    
});