<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\WhacenterChannel;
use App\Services\WhacenterService;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SippKonfirmasiNotification extends Notification
{
    use Queueable;
    private $dokumen;
    /**
     * Create a new notification instance.
     */
    public function __construct($dokumen)
    {
        $this->dokumen = $dokumen;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', WhacenterChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'dokumen_id' => $this->dokumen->id,
            'no_dokumen' => $this->dokumen->no_dokumen,
            'title' => 'Pembaruan Dokumen SIPP',
            'messages' => 'Dokumen SIPP dengan no '.$this->dokumen->no_dokumen.' telah dikonfirmasi oleh admin.',
            'url' => route('sipp.index'),
        ];
    }

    public function toWhacenter($notifiable)
    {
        // dd($notifiable);
        $url = URL::temporarySignedRoute(
            'login.url', 
            now()->addDays(3),
            [
                'dokumen_id' => $this->dokumen->id,
                'user_id' => $notifiable->id,
                'url' => route('sipp.index')
            ]
        );
        
        return (new WhacenterService())
            ->to($this->dokumen->pegawai->user->whatsapp)
            ->line("Halo, ".$this->dokumen->pegawai->user->nama."!")
            ->line("Ada pembaruan dokumen yang telah anda diupload.")
            ->line("Untuk melihat status dokumen, klik link berikut : ".$url)
            ->line("Jangan berikan link ini kepada siapapun karena bersifat rahasia.")
            ->line("Terimakasih.");
    }
}
