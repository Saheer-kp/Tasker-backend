<?php

use App\Http\Requests\Ai\AiChatRequest;
use Illuminate\Support\Facades\Validator;

it('passes when prompt is valid ', function () {

    $request = new AiChatRequest();

    $validator = Validator::make(
        ['prompt' => 'show my completed tasks'],
        $request->rules()
    );

    expect($validator->passes())->toBeTrue();
});


it('fails when prompt is empty', function () {
    $request = new AiChatRequest();

    $validator = Validator::make(
        [],
        $request->rules()
    );

    expect($validator->fails())->toBeTrue()
        ->and($validator->errors()->has('prompt'))->toBeTrue();
});


it('fails when promp is not a string', function () {
    $request = new AiChatRequest();

    $validator = Validator::make(
        ['prompt' => ['hello']],
        $request->rules()
    );

    expect($validator->fails())->toBeTrue();
});

it('fails when message is shorter than 2 characters', function () {
    $request = new AiChatRequest();

    $validator = Validator::make(
        ['message' => 'A'],
        $request->rules()
    );

    expect($validator->fails())->toBeTrue();
});

it('fails when message exceeds 2000 characters', function () {
    $request = new AiChatRequest();

    $validator = Validator::make(
        ['message' => str_repeat('a', 2001)],
        $request->rules()
    );

    expect($validator->fails())->toBeTrue();
});
