<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function list() {
        $products = Product::with('category')->get();
        return response()->json($products);
    }

    public function edit($id) {
        $product = Product::with('category')->find($id);
        $categories = Category::all();

        return [
            'product' => $product,
            'categories' => $categories
        ];
    }

    public function update(Request $request, $id) {

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Продукт не найден'], 404);
        }

        $product->update($request->all());

        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $imageName);
            $product->image = 'images/' . $imageName;
        }

        $product->save();

        return $request;
    }

    public function delete($id) {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Category deleted'], 200);
    }

    public function show($id) {
        $product = Product::with('category')->find($id);
        return $product;
    }
    public function my_products() {
        if (!Auth::check()) {
            return response()->json(['message' => 'Необходима аутентификация'], 401);
        }
        $products = Product::where('user_id', Auth::id())->with('category')->get();
        return response()->json($products);
    }
    public function create()
    {
        $categories = Category::all();
        return $categories;
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Необходима аутентификация'], 401);
        }

        $product = new Product();
        $product->user_id = Auth::id();
        $product->name = $request->name;
        $product->phone = $request->phone;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension(); // Генерация уникального имени файла
            $destinationPath = public_path('/images'); // Путь к папке images в корне проекта
            $image->move($destinationPath, $imageName); // Перемещение файла
            $product->image = 'images/' . $imageName; // Сохранение пути к изображению в базу данных
        }

        $product->save();

        return 200;
    }

//    protected $productService;
//
//    public function __construct(ProductService $productService)
//    {
//        $this->productService = $productService;
//    }
//
//    public function index()
//    {
//        $products = $this->productService->getAllProducts();
//        return response()->json($products);
//    }
//
//    public function store(ProductRequest $request)
//    {
//        $product = $this->productService->createProduct($request->validated());
//        return response()->json($product, 201);
//    }
//
//    public function show($id)
//    {
//        $product = $this->productService->getProductById($id);
//        if (!$product) {
//            return response()->json(['message' => 'Product not found'], 404);
//        }
//        return response()->json($product);
//    }
//
//    public function update(ProductRequest $request, $id)
//    {
//        $product = $this->productService->updateProduct($request->validated(), $id);
//        if (!$product) {
//            return response()->json(['message' => 'Product not found'], 404);
//        }
//        return response()->json($product);
//    }
//
//    public function destroy($id)
//    {
//        $product = $this->productService->getProductById($id);
//        if (!$product) {
//            return response()->json(['message' => 'Product not found'], 404);
//        }
//        $this->productService->deleteProduct($id);
//        return response()->json(null, 204);
//    }
}
