<?php

namespace App\Notifications;

use App\Models\Penjagaan;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PenjagaanNotification extends Notification 
{
    public $penjagaanCollection;

    public function __construct($penjagaanCollection)
    {
        $this->penjagaanCollection = $penjagaanCollection;
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'penjagaan' => $this->penjagaan,
            'message' => 'Pegawai dengan TMT_SK akan masuk ke dalam penjagaan bulan depan.',
        ]);
    }
}
