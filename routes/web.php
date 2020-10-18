<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
});
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/',[\App\Http\Controllers\HomeController::class,'index']);
// use \App\Http\Controllers\HomeController;
// Route::get('/',[HomeController::class,'index']);

// Route::group([
//     'prefix'=>'task',
// ],function(){
//     Route::get('create',[\App\Http\Controllers\Task\TaskController::class,'create'])
//     ->name('task.create');
//     Route::get('edit',[\App\Http\Controllers\Task\TaskController::class,'edit'])
//     ->name('task.edit');
//     Route::get('list',[\App\Http\Controllers\Task\TaskController::class,'index'])
//     ->name('task.list');
// });



// Route::resource('frontend/task',App\Http\Controllers\Frontend\TaskController::class);
Route::prefix('frontend/task')->group(function(){
    Route::get('/',[\App\Http\Controllers\Frontend\TaskController::class,'index'])
    ->name('task.index');

    Route::get('create',[\App\Http\Controllers\Frontend\TaskController::class,'create'])
    ->name('task.create');

    Route::post('/',[\App\Http\Controllers\Frontend\TaskController::class,'store'])
    ->name('task.store');
    Route::delete('delete/{id}',[\App\Http\Controllers\Frontend\TaskController::class,'destroy'])
        ->name('task.destroy');
  
        Route::get('/{task}',[\App\Http\Controllers\Frontend\TaskController::class,'show'])
        ->name('task.show');
        
        Route::put('/{id}',[\App\Http\Controllers\Frontend\TaskController::class,'update'])
        ->name('task.update');
        Route::get('{id}/edit',[\App\Http\Controllers\Frontend\TaskController::class,'edit'])
        ->name('task.edit');
});

Route::prefix('frontend/task')->group(function(){
    Route::get('complete/{id}',[\App\Http\Controllers\Frontend\TaskController::class,'complete'])
    ->name('task.complete');
    Route::get('recomplete',[\App\Http\Controllers\Frontend\TaskController::class,'reComplete'])->name('task.recomplete');
});
    
  





















//Buổi 3
Route::get('/hello1', function () {
    return view('hello1');
});
Route::get('/hello2', function () {
    return view('hello2');
});



//BTVN
//3.1
Route::get('profile',function(){
   
    $name='Nguyễn Thị Sinh';
    $birthday = '11/11/2000'; 
    $school = 'Học viện nông nghiệp Việt Nam';
    $address = 'Đông Anh - Hà Nội';
    $muc_tieu = 'Phát triển web...bla bla';

    return view('profile',[
        'name'=>$name,
        'date'=> $birthday,
        'school'=>$school,
        'add'=>$address,
        'mt'=>$muc_tieu

    ]);
});











// Router::redirect('foo','/');
Route::get('foo',function(){
    return 'Hello world';
});

Route::get('class-room/LARAVEL2020004/units',function(){
    return 'class-room/LARAVEL2020004/units';
})->name('classroom');

Route::post('save',function(){
    return 'post';
})->name('save');

// Route::match(['get','post'],'save',function(){
//     echo 'get post';
// });

Route::get('user/{id?}',function($id=null){ //? Có hoặc không cx đk
    echo route('classroom');
    return 'User '.$id;

});

Route::get('user/{id}/post/{post}',function($id,$idpost){
    return "This is post $idpost of user $id";
});


//Nhóm route
//Cách 1:

Route::prefix('admin')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/edit',function(){
            echo'admin/laravel';
        });
        Route::get('/create',function(){
            return 'admin/laravel';
        });
        Route::get('/delete',function(){
            return 'admin/laravel';
        });
    });

    // Route::get('/laravel20',function(){
    //     return 'admin/laravel';
    // });
    // Route::get('/laravel20/edit',function(){
    //     return 'admin/laravel20/edit';
    // });
    // Route::get('/laravel20',function(){
    //     return 'admin/laravel';
    // });


});

//Cách 2:
Route::group([
    'prefix'=>'admin',
],function(){
    Route::get('/laravel20',function(){
        return 'admin/laravel';
    });
    Route::get('/laravel20/edit',function(){
        return 'admin/laravel20/edit';
    });
});

//bai 2.1

// Route::get('task/complete/{id}',function(){
//     return 'Hoàn thành!';
// })->name('todo.task.complete');

// Route::get('task/reset/{id}',function(){
//     return 'Làm lại';
// })->name('todo.task.reset');

//bai2.2
//Nhóm route
// Route::group([
//     'prefix'=>'task',
// ],function(){
//     Route::get('complete/{id}',function(){
//         return 'Hoàn thành';
//     });
//     Route::get('reset/{id}',function(){
//         return 'Làm lại';
//     });
// });


