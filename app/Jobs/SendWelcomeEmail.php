<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $gan;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Send mail 10k row
        $cat = array_slice($this->data,2);
        // Cat => 9900 => $mang100
        print_r($cat). "<hr>";
        $this->data = array_diff($this->data, $cat);
        //dd($this->data);
        return self::handle();
    }
}
