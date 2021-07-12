<?php
namespace App\Services;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Public\SendMailController;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendMailOrderJob;
use Illuminate\Support\Carbon;

Class OrderService
{
    /* Function handling request order of user */
    public function handlingOrder($request)
    {
        DB::beginTransaction();
        try {
            $arrayUidProduct = $request->arrayUidProduct;
            $idOrder = $request->idOrder;
            $totalAmount = $request->totalAmount;
            $date_order = date('Y-m-d h:i:s');

            for($i = 0; $i < count($arrayUidProduct); $i++)
            {
                if($request->session()->has($arrayUidProduct[$i]))
                {   
                    $infoProduct = $request->session()->get($arrayUidProduct[$i]);
                    $idProduct = $infoProduct['idProduct'];
                    $quantity =  $infoProduct['quantity'];

                    /* Update quantity product in to the order_details table */
                    $updateQuantityProduct = OrderDetail::where('id_order', $idOrder)
                        ->where('id_product', $idProduct)
                        ->update(['quantity' => $quantity]);
                    if($updateQuantityProduct == true)
                    {
                        /* Delete session product saved */
                        $request->session()->forget($arrayUidProduct[$i]);
                    }
                }
            }

            /* Update status and total amount in to orders table */
            Order::where(['id' => $idOrder])->update(['date_order'=>$date_order, 'status' => 1, 'total_amount'=>$totalAmount]);

            /* Send email info order */
            $sendingMailOrder = $this->sendEmailOrder($idOrder);
            DB::commit();
            return ['message'=>__('message.send_mail_success'), 'status'=>true];
        } catch (\Throwable $th) {
            DB::rollBack();
            return ['message'=>__('message.error_order'), 'status'=>false];
        }
    }

    /* Function send email info order */
    private function sendEmailOrder($idOrder)
    {
        $userFullname = Auth::user()->fullname;
        $userEmail = Auth::user()->email;

        $sendMailOrderJob = (new SendMailOrderJob($idOrder, $userFullname, $userEmail));
        return dispatch($sendMailOrderJob);

    }
}

?>