<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // District
    Route::apiResource('districts', 'DistrictApiController');

    // Block
    Route::apiResource('blocks', 'BlockApiController');

    // Member
    Route::post('members/media', 'MemberApiController@storeMedia')->name('members.storeMedia');
    Route::apiResource('members', 'MemberApiController');

    // Panchayat
    Route::apiResource('panchayats', 'PanchayatApiController');
});
