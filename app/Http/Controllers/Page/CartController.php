<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart()
    {
        $dataProduct = Product::getProductByCategory();
        return view('PageSale.showCart', ['dataProduct' => $dataProduct]);
    }

    public function addToCart($id)
    {
        $dataProduct = Product::getProductByCategory();
        $product = Product::find($id);
        $price = $product->product_price - ($product->product_price * $product->product_discount)/100;
        if (!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $id => [
                    "product_id" => $product->product_id,
                    "product_name" => $product->product_name,
                    "product_quantity" => 1,
                    "product_price" => $price,
                    "product_image" => $product->product_image
                ]
            ];

            session()->put('cart', $cart);

            $htmlCart = view('PageSale.header', ['dataProduct'=> $dataProduct])->render();
            return response()->json(
                ['msg' => 'Product added to cart successfully!',
                'data' => $htmlCart, 'success' => true]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {

            $cart[$id]['product_quantity']++;

            session()->put('cart', $cart);

            $htmlCart = view('PageSale.header' , ['dataProduct'=> $dataProduct])->render();

            return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart,'success' => true]);

            //return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $product->product_id,
            "product_name" => $product->product_name,
            "product_quantity" => 1,
            "product_price" => $price,
            "product_image" => $product->product_image
        ];

        session()->put('cart', $cart);

        $htmlCart = view('PageSale.header', ['dataProduct'=> $dataProduct])->render();

        return response()->json(['msg' => 'Product added to cart successfully!', 'data' => $htmlCart,'success' => true]);

        //return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function updateCart(Request $request)
    {
        if ($request->id and $request->quantity) {
            $dataProduct = Product::getProductByCategory();
            $cart = session()->get('cart');

            $cart[$request->id]["product_quantity"] = $request->quantity;

            session()->put('cart', $cart);

            $subTotal = $cart[$request->id]['product_quantity'] * $cart[$request->id]['product_price'];

            $total = $this->getCartTotal();

            $htmlCart = view('PageSale.header',['dataProduct'=> $dataProduct])->render();

            return response()->json(['msg' => 'Cập nhật sản phẩm thành công', 'data' => $htmlCart, 'total' => $total, 'subTotal' => $subTotal]);

            //session()->flash('success', 'Cart updated successfully');
        }
    }

    public function deleteCart(Request $request)

    {
        $dataProduct = Product::getProductByCategory();
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            $total = $this->getCartTotal();

            $htmlCart = view('PageSale.header',['dataProduct'=>$dataProduct])->render();

            return response()->json(['msg' => 'Xóa sản phẩm thành công', 'data' => $htmlCart, 'total' => $total]);

            //session()->flash('success', 'Product removed successfully');
        }
    }


    /**
     * getCartTotal
     *
     *
     * @return float|int
     */
    private function getCartTotal()
    {
        $total = 0;

        $cart = session()->get('cart');

        foreach ($cart as $id => $details) {
            $total += $details['product_price'] * $details['product_quantity'];
        }

        return number_format($total, 2);
    }
}
