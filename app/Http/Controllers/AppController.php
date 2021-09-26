<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class AppController extends Controller
{
    private ProductRepository $productRepo;

    /**
     * @param ProductRepository $productRepo
     */
    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function index(Request $request)
    {
        return view('index', [
            'products' => $this->productRepo->trendingProducts()
        ]);
    }
}
