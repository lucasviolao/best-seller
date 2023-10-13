<?php

namespace App\Console\Commands;

use App\Http\Controllers\Web\ApplicationController;
use App\Models\Sales;
use App\Models\Seller;
use App\Repositories\SaleRepository;
use App\Repositories\SellerRepository;
use App\Services\SaleService;
use App\Services\SellerService;
use Illuminate\Console\Command;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';
    protected $controller;
    protected $seller;
    protected $sales;
    protected $sellerService;
    protected $saleService;
    protected $sellerRepository;
    protected $saleRepository;


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->seller = new Seller();
        $this->sales = new Sales();
        $this->sellerRepository = new SellerRepository($this->seller);
        $this->saleRepository = new SaleRepository($this->sales);
        $this->sellerService = new SellerService($this->sellerRepository);
        $this->saleService = new SaleService($this->saleRepository, $this->sellerRepository);
        $this->controller = new ApplicationController($this->sellerService, $this->saleService);
        $this->controller->endDaySellers();
        $this->controller->endDayAdmin();

        return Command::SUCCESS;
    }
}
