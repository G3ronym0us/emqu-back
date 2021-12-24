<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionnaireRequest;
use App\Models\Questionnaire;
use Illuminate\Http\Request;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionnaireRequest $request)
    {
        $questionnaire = Questionnaire::create([
            'email'             => $request->email,
            'age'               => $request->age,
            'gender'            => $request->gender,
            'social_network'    => $request->social_network,
            'facebook_time'     => $request->facebook_time,
            'whatsapp_time'     => $request->whatsapp_time,
            'twitter_time'      => $request->twitter_time,
            'instagram_time'    => $request->instagram_time,
            'tiktok_time'       => $request->tiktok_time,
        ]);

        return response()->json($questionnaire, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function getQuestionnairesAnswered(){
        return count(Questionnaire::all());
    }

    public function timeAverageForSocialNetwork(){
        return array(
            'Facebook' => Questionnaire::avg('facebook_time'),
            'Whatsapp' => Questionnaire::avg('whatsapp_time'),
            'Twitter' => Questionnaire::avg('twitter_time'),
            'Instagram' => Questionnaire::avg('instagram_time'),
            'TikTok' => Questionnaire::avg('tiktok_time'),
        );
    }

    public function getSocialNetworkFavorite(){
        $questionnaires = Questionnaire::groupBy('social_network')
                        ->select('social_network', Questionnaire::raw('count(*) as total'))
                        ->get();

        return $questionnaires->where('total',$questionnaires->max('total'))->first();
    }

    public function getSocialNetworkNotFavorite(){
        $questionnaires = Questionnaire::groupBy('social_network')
                        ->select('social_network', Questionnaire::raw('count(*) as total'))
                        ->get();

        return $questionnaires->where('total',$questionnaires->min('total'))->first();
    }

    public function getUseForAge(){
        $sn_array = array(
            'Facebook',
            'Whatsapp',
            'Twitter',
            'Instagram',
            'TikTok'
        );

        $response = array();

        foreach ($sn_array as $social_network) {
            $questionnaires = Questionnaire::groupBy('age')
                        ->select('age', Questionnaire::raw('count(*) as total'))
                        ->where('social_network',$social_network)
                        ->get();
            $questionnaire = $questionnaires->where('total',$questionnaires->max('total'))->first();

            array_push($response, array(
                'social_network'    => $social_network,
                'age'               => $questionnaire->age
            ));
        }

        
        return $response;
    }
}
