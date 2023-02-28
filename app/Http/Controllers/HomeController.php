<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\OrderItem;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    //
    public function generatePDF($InvId) {
        if(Invoice::find($InvId)){
            $products = OrderItem::where('invoice_id',$InvId)->get();

            $invoice = Invoice::where('id',$InvId)->get();
           
            // dd($invoice);
            $pdf = Pdf::loadView('invoice',["products"=>$products, "invoice" =>$invoice[0]]);
            return $pdf->download('invoice.pdf');

        }
        else{
            echo "Sorry!! Invoice Not Found";
        }
        
        

        


    }
}
