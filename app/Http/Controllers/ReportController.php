<?php

namespace App\Http\Controllers;

use App\Report;
use App\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    public function index()
    {
        $sales3Months = Sale::all()->where('created_at', '>=', Carbon::now()->subMonths(3)->firstOfMonth())->where('created_at', '<=' , Carbon::now()->subMonths(3)->lastOfMonth())->where('situation', 'paid');
        $sales2Months = Sale::all()->where('created_at', '>=', Carbon::now()->subMonths(2)->firstOfMonth())->where('created_at', '<=' , Carbon::now()->subMonths(2)->lastOfMonth())->where('situation', 'paid');
        $sales1Months = Sale::all()->where('created_at', '>=', Carbon::now()->subMonths(1)->firstOfMonth())->where('created_at', '<=' , Carbon::now()->subMonths(1)->lastOfMonth())->where('situation', 'paid');
        $salesThisMonth = Sale::all()->where('created_at', '>=', Carbon::now()->firstOfMonth())->where('created_at', '<=' , Carbon::now()->lastOfMonth())->where('situation', 'paid');

        $money3Months = $this->calculateSalesMoney($sales3Months);
        $money2Months = $this->calculateSalesMoney($sales2Months);
        $money1Months = $this->calculateSalesMoney($sales1Months);
        $moneyThisMonth = $this->calculateSalesMoney($salesThisMonth);

        $quantity3Months = $this->calculateSalesQuantity($sales3Months);
        $quantity2Months = $this->calculateSalesQuantity($sales2Months);
        $quantity1Months = $this->calculateSalesQuantity($sales1Months);
        $quantityThisMonth = $this->calculateSalesQuantity($salesThisMonth);

        return view('report.index', compact(
            'money3Months',
            'money2Months',
            'money1Months',
            'moneyThisMonth',
            'quantity3Months',
            'quantity2Months',
            'quantity1Months',
            'quantityThisMonth'
        ));
    }

    private function calculateSalesMoney(Collection $sales)
    {
        $sum = 0;

        foreach ($sales as $sale) {
            $sum += $sale->total;
        }

        return $sum;
    }

    private function calculateSalesQuantity(Collection $sales)
    {
        $sum = 0;

        foreach ($sales as $sale) {
            $sum += 1;
        }

        return $sum;
    }
}
