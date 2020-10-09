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

Route::get('/', function () {
    return view('home');
});
Route::get('/welcome', function () {
    return view('welcome');
});

//Buổi 3
Route::get('/hello1', function () {
    return view('hello1');
});
Route::get('/hello2', function () {
    return view('hello2');
});

Route::group([
    'prefix'=>'task',
],function(){
    Route::get('create', function () {
        return view('tasks.create');
    })->name('task.create');
    Route::get('edit', function () {
        
        $name ="Học lập trình";
    //Cách 1:
        // return view('tasks.edit',[
        //     'name'=>$name,
        // ]);
    //cách 2:
        return view('tasks.edit')->with([
            'name'=>$name
        ]);
    })->name('task.edit');
    Route::get('list', function () {
        $list = [
            [
                'name' => 'Học View trong Laravel',
                'status' => 0
            ],
            [
                'name' => 'Học Route trong Laravel',
                'status' => 1
            ],
           
            [
                'name' => 'Làm bài tập View trong Laravel',
                'status' => -1
            ],
        ];
        return view('tasks.list',['lists'=>$list]);
    })->name('task.list');
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

Route::get('task/complete/{id}',function(){
    return 'Hoàn thành!';
})->name('todo.task.complete');

Route::get('task/reset/{id}',function(){
    return 'Làm lại';
})->name('todo.task.reset');

//bai2.2
//Nhóm route
Route::group([
    'prefix'=>'task',
],function(){
    Route::get('complete/{id}',function(){
        return 'Hoàn thành';
    });
    Route::get('reset/{id}',function(){
        return 'Làm lại';
    });
});


