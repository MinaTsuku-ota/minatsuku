<?php

function delete_form($url, $label = '削除')
{
    $form = Form::open(['method' => 'DELETE', 'url' => $url, 'class' => 'd-inline']);
    $form .= Form::submit($label, ['class' => 'btn btn-danger']);
    $form .= Form::close();

    return $form;
}

function recaptcha($request){
    // captcha data request
    $response = (new \ReCaptcha\ReCaptcha( config('app.captcha_secret') ))
        ->setExpectedAction('localhost')
        // ->setScoreThreshold(0.5)
        ->verify($request->input('recaptcha'), $request->ip());

    // $responseによって条件判断
    if (!$response->isSuccess()) {
        abort(403);
        // dd($response);
    }
    return $response;
}