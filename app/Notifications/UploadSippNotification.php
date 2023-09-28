<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Channels\WhacenterChannel;
use App\Services\WhacenterService;
use Illuminate\Support\Facades\URL;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class UploadSippNotification extends Notification
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
            'photo' => $this->dokumen->pegawai->user->photo,
            'pegawai_id' => $this->dokumen->pegawai_id,
            'no_dokumen' => $this->dokumen->no_dokumen,
            'berlaku_sd' => $this->dokumen->berlaku_sd,
            'title' => 'Dokumen SIPP',
            'messages' => $this->dokumen->pegawai->user->nama. ' telah mengunggah dokumen sipp.',
            'url' => route('dokumenAdmin.detailSipp', $this->dokumen->id),
        ];
    }

    public function toWhacenter($notifiable)
    {
        $url = URL::temporarySignedRoute(
            'login.url', 
            now()->addDays(3),
            [
                'dokumen_id' => $this->dokumen->id,
                'user_id' => $notifiable->id,
                'url' => route('dokumenAdmin.detailSipp', $this->dokumen->id)
            ]
        );
        
        return (new WhacenterService())
            ->to($notifiable->whatsapp)
            ->line("Halo admin!")
            ->line("Ada dokumen baru yang telah diupload,")
            ->line($this->dokumen->pegawai->user->nama." telah mengunggah dokumen SIPP")
            ->line("Untuk melihat detail dokumen, klik link berikut : ".$url)
            ->line("Jangan berikan link ini kepada siapapun karena bersifat rahasia.");
    }
}
