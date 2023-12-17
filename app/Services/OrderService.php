<?php

namespace App\Services;

use App\Models\Order;
use Carbon\Carbon;

class OrderService
{
    public function getAllOrders()
    {
        $orders = Order::with(['client', 'product.category'])->whereNull('deleted_at')->get();

        return $orders->map(function ($order) {
            return [
                'order_id' => $order->id,
                'order_date' => $order->dateBuy instanceof Carbon ? $order->dateBuy->toDateString() : $order->dateBuy,
                'client' => [
                    'client_id' => $order->client->id,
                    'client_name' => $order->client->firstName . ' ' . $order->client->lastName,
                ],
                'product' => [
                    'product_id' => $order->product->id,
                    'product_name' => $order->product->name,
                    'product_price' => $order->product->price,
                    'category' => [
                        'category_id' => $order->product->category_id,
                        'category_name' => $order->product->category_name,
                    ],
                ],
            ];
        });
    }

    public function createOrder($data)
    {
        return Order::create($data);
    }

    public function getOrderById($id)
    {
        return Order::withTrashed()->findOrFail($id);
    }

    public function updateOrder($data, $id)
    {
        $order = $this->getOrderById($id);
        $order->update($data);
        return $order;
    }

    public function deleteOrder($id)
    {
        $order = $this->getOrderById($id);
        $order->delete();
        return $order;
    }
}