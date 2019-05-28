<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Services\ProductsService;
use App\Services\MerchantsService;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Redirect;
use Validator;


class ProductsController extends Controller
{

    private $productsService;
    private $merchantsService;

    /**
     * ProductsController constructor.
     *
     * @param ProductRepositoryInterface $product
     */
    public function __construct(ProductsService $productsService, MerchantsService $merchantsService)
    {
        $this->productsService = $productsService;
        $this->merchantsService = $merchantsService;
    }

    /**
     * List all products.
     *
     * @return mixed
     */
    public function index()
    {
        return view('products.index', [
            'products' => $this->productsService->getProducts()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.add', [
            'merchants' => $this->merchantsService->getMerchantsByIds()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ProductRequest $request)
    {
        $this->productsService->saveProduct($request->all());

        return view('products.index', [
            'products' => $this->productsService->getProducts()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view('products.show', [
            'product' => $this->productsService->getProduct($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view('products.edit', [
            'product' => $this->productsService->getProduct($id),
            'merchants' => $this->merchantsService->getMerchantsByIds()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(ProductRequest $request, $id)
    {
        $input = Input::only(['merchant_id', 'name', 'description', 'price', 'status']);
        $this->productsService->editProduct($id, $input);

        return view('products.index', [
            'products' => $this->productsService->getProducts()
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->productsService->destroyProduct($id);
        return view('products.index', [
            'products' => $this->productsService->getProducts()
        ]);
    }


}
