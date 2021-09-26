<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{
    public string $model = Product::class;

    public function trendingProducts(int $limit = 10)
    {
        if ($limit < 1) {
            $limit = 5;
        }

        return $this->newQuery()->limit($limit)->get();
    }
}
