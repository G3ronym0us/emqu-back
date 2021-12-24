<?php

use App\Http\Controllers\api\QuestionnaireController;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('questionnaire', QuestionnaireController::class);

Route::get('questionnaires_answered', [QuestionnaireController::class, 'getQuestionnairesAnswered']);
Route::get('time_average_social_network', [QuestionnaireController::class, 'timeAverageForSocialNetwork']);
Route::get('get_favorite_sn', [QuestionnaireController::class, 'getSocialNetworkFavorite']);
Route::get('get_not_favorite_sn', [QuestionnaireController::class, 'getSocialNetworkNotFavorite']);
Route::get('get_use_for_age', [QuestionnaireController::class, 'getUseForAge']);
