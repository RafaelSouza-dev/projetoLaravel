<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        /*VerifyEmail::toMailUsing(function($notifiable, $url){

            return (new MailMessage)
            ->subject(Lang::get('Notificação de vverificação de e-mail'))
            ->line(Lang::get('Por favor,  clique no link abaixo parra verificar seu e-mail.'))
            ->action(Lang::get('Verifique seu e-mail '),$url)
            ->line(Lang::get('Este link de redefinição de senha vai expirar em :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]));
        });

        ResetPassword::toMailUsing(function($notifiable, $url){

            return (new MailMessage)
            ->subject(Lang::get('Notificação de redefinição de senha'))
            ->line(Lang::get('Você está recebendo esse email porque recebemos um pedido de redefinição de senha da sua conta.'))
            ->action(Lang::get('Redefinir senha clicando no link '),$url)
            ->line(Lang::get('Este link de redefinição de senha vai expirar em :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Se você não solicitou a redefinição de sua senha, ignore esse email.'));
        });*/
    }
}
