<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Mail\AdminMail;
use App\Mail\SellerMail;
use App\Services\SaleService;
use App\Services\SellerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    protected $sellerService;
    protected $saleService;

    public function __construct(SellerService $sellerService, SaleService $saleService)
    {
        $this->sellerService = $sellerService;
        $this->saleService = $saleService;
    }

    public function index()
    {
        

        //dd($sellers);

        return view('index');
    }

    public function showSellers()
    {
        $sellers = $this->sellerService->getSellers();
        return view('sellers', [
            'sellers' => $sellers
        ]);
    }

    public function showSales()
    {
        $sales = $this->saleService->getSales();
        return view('sales', [
            'sales' => $sales
        ]);

    }

    public function showSalesToSeller(Request $request)
    {
        $sales = [];
        $sellers = $this->sellerService->getSellers();


        if ($request->method() == 'POST') {
            
            $sales = $this->saleService->getSalesToSeller($request->get('vendedor'));
        }

        return view('sales-seller', [
            'sales' => $sales,
            'sellers' => $sellers
        ]);

    }

    public function endDaySellers()
    {
        $mailSellers = $this->sellerService->getSellers();

        foreach($mailSellers as $mailSeller) {
            Mail::to($mailSeller->email)->send(new SellerMail($this->sellerService, $this->saleService, $mailSeller->id));
        }
    }

    public function endDayAdmin()
    {
        
        
        Mail::to('admin@sualoja.com')->send(new AdminMail($this->sellerService, $this->saleService));
        
    }
}
