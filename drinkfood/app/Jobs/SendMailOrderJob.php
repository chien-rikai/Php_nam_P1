<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\Public\SendMailController;
use App\Models\Order;
use App\Models\OrderDetail;

class SendMailOrderJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $tries = 3;
    public $idOrder;
    public $userFullname;
    public $userEmail;

    public function __construct($idOrder, $userFullname, $userEmail)
    {
        $this->idOrder = $idOrder;
        $this->userFullname = $userFullname;
        $this->userEmail = $userEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sendMailController = new SendMailController;

        /* Get info orders */
        $infoOrder = Order::where('id', $this->idOrder)->select('name', 'total_amount', 'status', 'url_key', 'uid','updated_at')->get()->toArray();
        $detailOrder = OrderDetail::where('id_order', $this->idOrder)->select('id_product', 'quantity', 'unit_price')->get()->toArray();

        $email_received = $this->userEmail;
        $email_content = [
            'infoUser' => [
                'fullname' => $this->userFullname,
                'email' => $this->userEmail,
            ],
            'infoOrder' => $infoOrder,
            'detailOrder' => $detailOrder,
            
        ];
        
        return $sendMailController->sendMailOrders($email_received, $email_content);
    }
}
