<div class="product_box">    
    <h1>{{ trans('message.history_order') }}</span></h1>
    <table border="1">
        <tr>
            <th>{{ trans('message.num_order') }}</th>
            <th>{{ trans('message.order_name') }}</th>
            <th>{{ trans('message.time_order') }}</th>
            <th>{{ trans('message.status') }}</th>
            <th>{{ trans('message.option') }}</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Cơm gà 123 - 182Absu1320</td>
            <td>06/06/2021 - 10:20</td>
            <td>{{ trans_choice('message.status_order', 1)}}</td>
            <td>
                <a href="#" class="btn btn_green"><i class="fas fa-info-circle">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.detail') }}</a>
                <a href="#" class="btn btn_green"><i class="fas fa-print">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_print') }}</a>
                <a href="#" class="btn btn_green"><i class="fas fa-download">&nbsp;&nbsp;&nbsp;</i>{{ trans('message.invoice_export') }}</a>
            </td>
        </tr>
    </table>
</div>