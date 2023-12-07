<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function index(Request $request)
     {
        $lastPage = 3;

        // Set the desired number of products per page
        $perPage = 5;
        $perRequest = 10;


        $allProducts = Product::all();
        if(count($allProducts) > ($perPage * $lastPage)) {
            $products =  DB::table('products')->limit($perPage * $lastPage)->paginate($perPage);
        } else {
            $dataLeft = ($perPage * $lastPage) - count($allProducts);
            $loopCount = (int)round(($dataLeft / $perRequest), 0, PHP_ROUND_HALF_UP);

            for ($i = 0; $i < $loopCount; $i++) {
                $currentlyLeft = ($perPage * $lastPage) - ($i * $perRequest);
                $this->fetchProducts(count(Product::all()), $perRequest);
            }
            $products = Product::limit($perPage * $lastPage)->paginate($perPage);
        }

        // dd($products);

        return view('products.index', compact('products'));
     }

    /**
     * Show the form for creating a new resource.
     */
    public function fetchProducts( $skip = 0, $limit = 10)
    {
        try {
            $client = new Client();
            $baseUrl = 'https://dummyjson.com/products';

            $response = $client->get($baseUrl, [
                'query' => [
                    'limit' => $limit,
                    'skip' => $skip,
                ],
            ]);

            $products = json_decode($response->getBody(), true);

            if (!is_array($products) || !isset($products['products'])) {
                throw new Exception('Invalid response format from API. Expected an array with "products" key.');
            }

            // Use the insertOrUpdateProducts method to insert or update the products in the database
            $this->insertOrUpdateProducts($products['products']);

            // $this->info('Products fetch and update completed.');
        } catch (Exception $e) {
            throw new Exception('Error: ' . $e->getMessage());
        }
    }

    protected function insertOrUpdateProducts($products)
    {
        foreach ($products as $productData) {
            // Use updateOrCreate to create or update the product based on its ID
            Product::updateOrCreate(
                ['id' => $productData['id']],
                [
                    'id' => $productData['id'],
                    'title' => $productData['title'],
                    'description' => $productData['description'],
                    'price' => $productData['price'],
                    'discount_percentage' => $productData['discountPercentage'],
                    'rating' => $productData['rating'],
                    'stock' => $productData['stock'],
                    'brand' => $productData['brand'],
                    'category' => $productData['category'],
                    'thumbnail' => $productData['thumbnail'],
                    'images' => json_encode($productData['images']),
                ]
            );

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
