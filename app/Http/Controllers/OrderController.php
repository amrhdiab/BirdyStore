<?php

namespace App\Http\Controllers;

use App\Mail\OrderDelivered;
use App\Mail\OrderShipped;
use App\Order;
use App\Review;
use App\Message;
use Illuminate\Http\Request;
use App\Setting;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index()
    {
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        $settings = Setting::first();
        return view('admin.orders.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Fetch Initial orders data to display via DataTables
    public function fetchData()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        return Datatables::of($orders)->addColumn('actions', function ($order)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $order->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $order->id . '"><i class="glyphicon glyphicon-edit"></i> Edit Status</button>
            <button class="btn btn-xs btn-danger delete" id="' . $order->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="order_checkbox[]" class="order_checkbox"  value="{{$id}}" />')
            ->addColumn('user_name', function ($order)
            {
                return $order->user->name;
            })
            ->addColumn('products_count', function ($order)
            {
                return count($order->products);
            })
            ->addColumn('quantity_total', function ($order)
            {
                return $order->products()->sum('quantity');
            })
            ->addColumn('current_status', function ($order)
            {
                if ($order->status == 'Waiting')
                {
                    return '<span class="label label-warning">' . $order->status . '</span>';
                } elseif ($order->status == 'Shipped')
                {
                    return '<span class="label label-info">' . $order->status . '</span>';
                } else
                {
                    return '<span class="label label-success">' . $order->status . '</span>';
                }

            })
            ->rawColumns(['actions', 'checkboxes', 'current_status'])->make(true);
    }


    //Update
    public function store(Request $request)
    {
        $rules = [
            'status' => 'required',
        ];
        $validation = Validator::make($request->all(), $rules);
        $errors_output = [];
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors_output[] = $messages[0];
            }
        } else
        {
            $order = Order::find($request['order_id']);

            $order->update([
                'status' => $request['status'],
            ]);

            //Send and e-mail to the user informing him of the change
            if ($request['status'] == 'Shipped')
            {
                \Mail::to($order->user->email)->send(new OrderShipped($order->id));
            } elseif ($request['status'] == 'Delivered')
            {
                \Mail::to($order->user->email)->send(new OrderDelivered($order->id));
            }
        }

        $output = [
            'error' => $errors_output,
        ];
        return response()->json($output);
    }

    //Fetch data for view
    public function view(Request $request)
    {
        $order = Order::find($request['id']);

        //Products info table
        $key = 1;
        $products_Output = '';
        foreach ($order->products as $product)
        {
            $products_Output .=
                '<tr class="text-center">
                <td>' . $key++ . '</td>
                <td><img src="' . asset('/storage/products/') . '/' . $product['featured_image'] . '" alt="product image" height="50px" width="50px"></td>
                <td>' . $product->name . '</td>
                <td>' . $product->pivot->quantity . '</td>
                <td>$' . number_format($product->new_price, 2) . '</td>
                <td>$' . number_format($product->new_price * $product->pivot->quantity, 2) . '</td>
                <td><a type="button" href="/shop/product/' . $product->slug . '" class="btn btn-sm btn-default">Product Shop</a>
                </td>
            </tr>';
        }
        return response()->json(['order' => $order, 'order_products' => $products_Output]);
    }

    //Remove single data record
    public function removeData(Request $request)
    {
        $order = Order::find($request['id']);

        if ($order->delete())
        {
            $order->products()->detach();
            return response()->json('Successfully deleted.');
        }
    }

    //Remove bulk data records
    public function removeBulk(Request $request)
    {
        $orders_id_array = $request['id'];
        foreach ($orders_id_array as $order_id)
        {
            $order = Order::find($order_id);
            if ($order->delete())
            {
                $order->products()->detach();
            }
        }
        return response()->json('Data deleted successfully.');
    }

    public function selectStatus(Request $request)
    {
        $order = Order::find($request['id']);
        $output = '';

        if ($order['status'] == 'Waiting')
        {
            $output .= '<option value="Waiting" selected>Waiting</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered">Delivered</option>';
        } elseif ($order['status'] == 'Shipped')
        {
            $output .= '<option value="Waiting">Waiting</option>
                        <option value="Shipped" selected>Shipped</option>
                        <option value="Delivered">Delivered</option>';
        } else
        {
            $output .= '<option value="Waiting">Waiting</option>
                        <option value="Shipped">Shipped</option>
                        <option value="Delivered" selected>Delivered</option>';
        }

        return response()->json($output);
    }
}
