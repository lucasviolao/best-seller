<?php

namespace App\Mail;

use App\Services\SaleService;
use App\Services\SellerService;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SellerMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $sellerService;
    protected $saleService;
    protected $sellerId;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(SellerService $sellerService, SaleService $saleService, $sellerId)
    {
        $this->sellerService = $sellerService;
        $this->saleService = $saleService;
        $this->sellerId = $sellerId;
    }

    public function build()
    {
        $dt = Carbon::make(Carbon::now())->format('Y-m-d');
        $cont = 0;
        $amountTotal = 0;
        //dd($dt);
        $sales = $this->saleService->getSalesToSeller($this->sellerId);
        return $this->markdown('mail.seller-mail',[
            'sales' => $sales,
            'dt' => $dt,
            'cont' => $cont,
            'amountTotal' => $amountTotal
        ]);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    /*public function envelope()
    {
        return new Envelope(
            subject: 'Seller Mail',
        );
    }*/

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    /*public function content()
    {
        return new Content(
            view: 'mail.seller-mail',
        );
    }*/

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    /*public function attachments()
    {
        return [];
    }*/
}
