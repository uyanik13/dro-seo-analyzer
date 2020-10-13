<?php

namespace DRO\SeoAnalyzer\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AnalyzerMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $seoInfo)
    {
        $this->seoInfo = $seoInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('dro::seo-analyzer-mail',[
              'seoInfo' => $this->seoInfo
        ]);


    }
}
