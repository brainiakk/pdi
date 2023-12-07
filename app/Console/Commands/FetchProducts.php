<?php

namespace App\Console\Commands;

use App\Models\Product;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class FetchProducts extends Command
{

    protected $signature = 'fetch:products';
    protected $description = 'Fetch products from DummyJSON.com API.';
    public function handle()
    {
        try {
            $client = new Client();
            $baseUrl = 'https://dummyjson.com/products';


            $response = $client->get($baseUrl, [
                'query' => [
                    'limit' => 10,
                ],
            ]);

            $products = json_decode($response->getBody(), true);

            if (!is_array($products) || !isset($products['products'])) {
                throw new Exception('Invalid response format from API. Expected an array with "products" key.');
            }


            $this->insertOrUpdateProducts($products['products']);
            $this->info('Products fetch and update completed.');
        } catch (Exception $e) {
            $this->error('Error: ' . $e->getMessage());
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

            $this->info("Product processed: " . $productData['title']);
        }
    }
}
