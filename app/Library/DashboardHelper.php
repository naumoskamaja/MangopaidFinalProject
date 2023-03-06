<?php

namespace App\Library;

use App\Models\Order;
use App\Models\OrderItem;

class DashboardHelper
{
    static function ordersData(){
        $balance = 0;
        $calculatedTaxes = 0;
        $orders = Order::all();
        $counter = count($orders);
        foreach ($orders as $order) {
            $balance += $order->total;
            foreach ($order->items as $item) {
                $calculatedTaxes += $item->qty * $item->product->price * $item->product->tax / 100;
            }
        }
        $returnData = [
            'tax' => $calculatedTaxes,
            'balance' => $balance,
            'revenue' => $balance - $calculatedTaxes,
            'totalNumberOrders' => $counter
        ];

        return $returnData;
    }


    static function countOrdersByStatus($status)
    {
        $counter = Order::where('status', $status)->count();
        return $counter;
    }

    static function countOrdersByStatusMonthly($status, $m, $months, $key)
    {
        $orders = Order::where('status', $status)->whereBetween('created_at', [$m, $months[$key + 1]])->count();
        return $orders;
    }

    static function countOrdersYearly()
    {
        $months = array();
        for ($m = 1; $m <= 13; $m++) {
            $months[] = date('Y-m-d', mktime(0, 0, 0, $m, 1, date('Y')));
        }

        $pending_orders = [];
        $paid_orders = [];
        $confirmed_orders = [];
        $sent_orders = [];
        $shipped_orders = [];
        $rejected_orders = [];


        foreach ($months as $key => $m) {
            if ($key != count($months) - 1) {
                $pending_orders[] = DashboardHelper::countOrdersByStatusMonthly(0, $m, $months, $key);
                $paid_orders[] = DashboardHelper::countOrdersByStatusMonthly(1, $m, $months, $key);
                $confirmed_orders[] = DashboardHelper::countOrdersByStatusMonthly(2, $m, $months, $key);
                $sent_orders[] = DashboardHelper::countOrdersByStatusMonthly(3, $m, $months, $key);
                $shipped_orders[] = DashboardHelper::countOrdersByStatusMonthly(4, $m, $months, $key);
                $rejected_orders[] = DashboardHelper::countOrdersByStatusMonthly(5, $m, $months, $key);
            }
        }

        $returnData = [
            'pending_orders' => $pending_orders,
            'paid_orders' => $paid_orders,
            'confirmed_orders' => $confirmed_orders,
            'sent_orders' => $sent_orders,
            'shipped_orders' => $shipped_orders,
            'rejected_orders' => $rejected_orders,
        ];

        return $returnData;
    }

    static function getLatestOrders(){
        return Order::latest()->limit(7)->get();
    }

    static function getBestsellers()
    {
        return OrderItem::selectRaw('product_id,SUM(order_items.qty) as soldItems')
            ->groupBy('product_id')
            ->orderBy('soldItems', 'desc')
            ->with('product')
            ->take(10)->get();
    }

    static function getCircleChartData()
    {
        $pending_counter = DashboardHelper::countOrdersByStatus(0);
        $paid_counter = DashboardHelper::countOrdersByStatus(1);
        $confirmed_counter = DashboardHelper::countOrdersByStatus(2);
        $sent_counter = DashboardHelper::countOrdersByStatus(3);
        $shipped_counter = DashboardHelper::countOrdersByStatus(4);
        $rejected_counter = DashboardHelper::countOrdersByStatus(5);
        $circleChartData = [$pending_counter, $paid_counter, $confirmed_counter, $sent_counter, $shipped_counter, $rejected_counter];

        return $circleChartData;

    }

    static function get_successful_orders_total(){
        $successful_orders = Order::where('status','<',5)->get();
        $totalSumSuccessfulOrders = 0;
        foreach ($successful_orders as $order){
            $totalSumSuccessfulOrders += $order->total;
        }

        return $totalSumSuccessfulOrders;
    }

}
