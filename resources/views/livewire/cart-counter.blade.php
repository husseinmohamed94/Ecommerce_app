
    <div class="mb-4 px-4 leading-normal text-blue-700 bg-primary  rounded-lg" >

        <div class="btn-group">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-shopping-cart"></i>
                cart ( {{ $cart_count }})
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php foreach(\Gloudemans\Shoppingcart\Facades\Cart::content() as $row) :?>

                    <tr>
                        <td>{{ $row->name;  }}  </td>

                        <td><input type="number" value="<?php echo $row->qty; ?>"   style="width:50px;"></td>
                        <td>$<?php echo $row->price; ?></td>
                        <td>$<?php echo $row->total; ?></td>
                    </tr>

                    <?php endforeach;?>

                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Subtotal</td>
                        <td><?php echo \Gloudemans\Shoppingcart\Facades\Cart::subtotal(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Tax</td>
                        <td><?php echo Cart::tax(); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td>Total</td>
                        <td><?php echo Cart::total(); ?></td>
                    </tr>


                    </tfoot>
                </table>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" href="{{route('order.create')}}">Save changes</a>
            </div>
        </div>

    </div>


