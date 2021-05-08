<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Sale\CreateRequest;
use App\Repositories\SaleRepository;
use App\Repositories\UserRepository;

class SaleController extends Controller
{
    private $saleRepository;
    private $userRepository;

    public function __construct(SaleRepository $SaleRepository,UserRepository $UserRepository)
    {
        $this->saleRepository = $SaleRepository;
        $this->userRepository = $UserRepository;
    }

    public function index()
    {
        $datas = $this->saleRepository->getData();
        $user = $this->userRepository->getData();
        return view(checkView('admin.sale.index'), compact('datas','user'));
    }

    public function store(CreateRequest $request)
    {
        return response()->json($this->saleRepository->storeData($request));
    }

    public function show($id)
    {
        return response()->json($this->saleRepository->showData($id));
    }
}
