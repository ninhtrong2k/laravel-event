<?php

namespace App\Listeners;

use App\Events\OrderPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailAfterOderPayment implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\OrderPayment  $event
     * @return void
     */
    public function handle(OrderPayment $event)

    {
        sleep(10);

        //
        // return false;
        /// Xử lsy logic email
        //Amount
        $amount = $event->order->amount;
        $note = $event->order->note;
        $content = "note  $amount $note";

        // dd($event->order);

        $filePath = './data.txt';
        // Kiểm tra xem thư mục 'data' có tồn tại không, nếu không thì tạo mới
        $directory = dirname($filePath);
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
    
        // Ghi nội dung vào tệp
        file_put_contents(base_path().$filePath, $content);    }

}
