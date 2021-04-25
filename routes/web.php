<?php

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
    return view('blog/index', 'blog/post', 'admin/index', 'admin/create', 'admin/edit', 'about/about');
});

Route :: post (’create’, function (\Illuminate\Http\Request $request ,
                     \Illuminate\Validation\Factory $validator ) {
    $validation = $validator -> make ( $request -> all () , [
    ’title’=> ’required| min : 5’,
    ’content’=> ’required | min : 10 ’
    ]);
    if ( $validation -> fails ()) {
    return redirect ()->back () -> withErrors ( $validation );
    }
    return redirect ()
    -> route (’admin . index’)
    -> with (’info’ , ’Postcreated , Title : ’ . $request -> input ( ’title’ ));
    }) -> name ( ’admin . create’);

    Route :: post ( ’edit’, function (\Illuminate\Http \ Request $request ,
             \Illuminate\Validation\Factory $validator ) {
    $validation = $validator -> make ( $request -> all () , [
    ’title’ => ’required | min :5 ’,
    ’content’ => ’required | min :10 ’
    ]);
    if ( $validation -> fails ()) {
    return redirect () -> back () -> withErrors ( $validation );
    }
    return redirect ()
    -> route ( ’admin . index’)
    -> with ( ’info’ , ’Postedited , new Title : ’ . $request - > input ( ’ title ’ ));
    }) - > name ( ’admin . update );