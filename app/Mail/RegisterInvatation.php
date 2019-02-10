<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class RegisterInvatation extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $campaignId;
    protected $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $token, $campaignId)
    {
        $this->user = $user;
        $this->token = $token;
        $this->campaignId = $campaignId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your magic login link')->view('auth.link')->with([
            'link' => $this->buildLink()
        ]);
    }

    public function buildLink(){
        return url("campaigns/" . $this->campaignId .  "/user?invatation_token=" . $this->token . "&email=" . $this->user->email);
    }
}
