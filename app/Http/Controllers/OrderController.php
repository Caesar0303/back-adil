<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index()
    {
        $orders = $this->orderService->getAllOrders();
        return response()->json(['orders' => $orders]);
    }

    public function store(OrderRequest $request)
    {
        $order = $this->orderService->createOrder($request->all());
        return response()->json($order, 201);
    }

    public function show($id)
    {
        $order = $this->orderService->getOrderById($id);
        if ($order) {
            return response()->json($order);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $order = $this->orderService->updateOrder($request->all(), $id);
        if ($order) {
            return response()->json($order);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }

    public function destroy($id)
    {
        $order = $this->orderService->getOrderById($id);
        if ($order) {
            $this->orderService->deleteOrder($id);
            return response()->json(null, 204);
        } else {
            return response()->json(['message' => 'Order not found'], 404);
        }
    }
}
