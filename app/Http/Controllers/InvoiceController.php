<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\OrderItem;

class InvoiceController extends Controller
{
    //

    public function create(Request $request){
        
        $products = json_decode($request->products, TRUE);
        //dd($products);
        $invoice = Invoice::create([
            "customer_name" => $request->customer_name,
            "customer_phone" => $request->customer_phone,
            "customer_street" => $request->customer_street,
            "customer_city" => $request->customer_city,
            "customer_country" => $request->customer_country,
            "inv_date" => date('Y-m-d'),
            "subtotal" => $request->subtotal,
            "tax" => $request->tax,
            "total" => $request->total,
        ]);     

        for($i = 0;$i < count($products);$i++)
		{
			    OrderItem::create([
                    "invoice_id" => $invoice->id,
                    "product_id" => $products[$i]['id'],
                    "rate" => $products[$i]['price'],
                    "qty" => $products[$i]['qty'],
                    "amount" => $products[$i]['amount'],
                ]);
		}

        return ["msg" => "success"];
    }  


    public function update(Request $request){
        
        $products = json_decode($request->products, TRUE);
        //dd($products);
        $invoice = Invoice::where("id",$request->invoice_id)->update([
            "customer_name" => $request->customer_name,
            "customer_phone" => $request->customer_phone,
            "customer_street" => $request->customer_street,
            "customer_city" => $request->customer_city,
            "customer_country" => $request->customer_country,
            "inv_date" => date('Y-m-d'),
            "subtotal" => $request->subtotal,
            "tax" => $request->tax,
            "total" => $request->total,
        ]);     

        OrderItem::where("invoice_id",$request->invoice_id)->delete();

        for($i = 0;$i < count($products);$i++)
		{
			    OrderItem::create([
                    "invoice_id" => $request->invoice_id,
                    "product_id" => $products[$i]['product_id'],
                    "rate" => $products[$i]['rate'],
                    "qty" => $products[$i]['qty'],
                    "amount" => $products[$i]['amount'],
                ]);
		}

        return ["msg" => "success"];
    }  

    public function delete(Request $request){
            

        Invoice::where("id",$request->invoice_id)->delete();
        OrderItem::where("invoice_id",$request->invoice_id)->delete();

        return ["msg" => "success"];
    }  

    public function index(){
        // $invoices = Invoice::with('products')->get();
        $invoices = Invoice::paginate(5);
        //dd($invoices);

        return ["invoices" => $invoices];
    }

    public function showProducts($InvId){
        $products = OrderItem::where('invoice_id',$InvId)->get();
        return ["products" => $products];
    }

    public function show($InvId){
        $invoice = Invoice::where('id',$InvId)->get();
        return ["invoice" => $invoice];
    }

    public function shareInvoice($InvId,$customer_name){
        
        $shareComponents =   \Share::page(`/invoice/${InvId}`, `Invoice id- ${InvId} , Customer: ${customer_name}`)
                ->facebook()
                ->twitter()
                ->linkedin('Extra linkedin summary can be passed here')
                ->whatsapp()
                ->telegram()
                ->reddit();
        dd($shareComponents);
        return  var_dump($shareComponents);
    }
}


