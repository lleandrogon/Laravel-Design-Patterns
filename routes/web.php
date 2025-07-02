<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::resource('todos', TodoController::class);

Route::get('/teste-email', function () {
    $user = \App\Models\User::first();

    Mail::to($user->email)->send(new class extends \Illuminate\Mail\Mailable {
        public function build()
        {
            return $this->subject('Teste Laravel')
                        ->html('<h1>Funcionando</h1><p>Esse é um teste de envio de e-mail.</p>');
        }
    });

    return 'E-mail enviado (tente conferir no Mailtrap).';
});
