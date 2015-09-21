<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',function(){
    return view('app');
});
Route::any('oauth/access_token',function(){
    // $input = \Input::all();
    $request = \Request::instance();
    // $request->request->replace($input);
    $request->request->replace(\Request::all());
    Authorizer::setRequest($request);
    return Response::json(Authorizer::issueAccessToken());
});
Route::group(['middleware'=>'oauth'],function(){
    Route::get('client',['uses'=>'ClientController@index','as'=>'client.index']);
    Route::post('client',['uses'=>'ClientController@store','as'=>'client.store']);
    Route::get('client/{id}',['uses'=>'ClientController@show','as'=>'client.show']);
    Route::delete('client/{id}',['uses'=>'ClientController@destroy','as'=>'client.destroy']);
    Route::put('client/{id}',['uses'=>'ClientController@destroy','as'=>'client.update']);

    Route::get('project/{id}/note','ProjectNoteController@index');
    Route::post('project/{id}/note','ProjectNoteController@store');
    Route::get('project/{id}/note/{noteID}','ProjectNoteController@show');
    Route::put('project/{id}/note/{noteID}','ProjectNoteController@update');
    Route::delete('project/{id}/note/{noteID}','ProjectNoteController@destroy');
    Route::get('project/{id}',['uses'=>'ProjectController@show','as'=>'project.show']);

    Route::get('project',['uses'=>'ProjectController@index','as'=>'project.index']);
    Route::post('project',['uses'=>'ProjectController@store','as'=>'project.store']);
    Route::delete('project/{id}',['uses'=>'ProjectController@destroy','as'=>'project.destroy']);
    Route::put('project/{id}',['uses'=>'ProjectController@destroy','as'=>'project.update']);
});