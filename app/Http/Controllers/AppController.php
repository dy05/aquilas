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
        $this->middleware('auth')->only(['command']);
    }

    public function index(Request $request)
    {
        return view('welcome', [
            'products' => $this->productRepo->trendingProducts()
        ]);
    }

    public function command(Request $request, int $id)
    {
        return view('index', [
            'product' => $id
        ]);
    }
}
