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

Route::post('/createByUid', function (Request $request) {
    $request->validate([
        'uid' => 'required',
        'email'=>'required|email',
        'phone'=>'nullable',
        'name'=>'required'
    ]);
    $user = User::where('uid', $request->uid)->first();
    if (!$user) {
        $newUser = new User(['name'=>$request->name,'uid'=>$request->uid,'email'=>$request->email,'password'=>'mobile','phone'=>$request->phone]);
        if($newUser->save()){
            $result = ["status"=>true,"message"=>"User created successfully.","token"=>$newUser->createToken($request->uid)->plainTextToken,"data"=>$newUser];
            return json_encode($result);
        }else{
            $result = ["status"=>false,"message"=>"User creation fail.","token"=>"","data"=>[]];
            return json_encode($result);
        }
    }
    $result = ["status"=>true,"message"=>"Token created.","token"=>$user->createToken($request->uid)->plainTextToken,"data"=>$user];
    return json_encode($result);
});
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user', function (Request $request) {
        return $request->user()->toJson();
    });
    Route::get('/categories',function(Request $request){
        return Category::all()->toJson();
    });
    Route::get('/books',function(Request $request){
        return Book::all()->toJson();
    })->middleware('auth:sanctum');    
});