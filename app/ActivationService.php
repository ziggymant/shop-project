<?php

namespace App;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ActivationService
{

    protected $mail;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mail $mail, ActivationRepository $activationRepo)
    {
        $this->mail = $mail;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
        $message = sprintf('Activate account <a href="%s">%s</a>', $link, $link);

        // $this->mail->raw($message, function (Message $m) use ($user) {
        //     $m->to($user->email)->subject('Activation mail');
        // });

        $data = ['name'=>$user->name, 'email'=>$user->email, 'link'=>$link];

        Mail::send('emails.test', $data, function($message) use ($user){

          $message->to($user->email, $user->name)->subject('Hello Ziggy');
        });


    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->is_active = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}
