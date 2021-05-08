<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Config\CreateRequest;
use App\Http\Requests\Config\EditRequest;
use App\Repositories\ConfigRepository;
use App\Repositories\UserRepository;

class ConfigController extends Controller
{
    private $configRepository;
    private $userRepository;

    public function __construct(ConfigRepository $ConfigRepository,UserRepository $UserRepository)
    {
        $this->configRepository = $ConfigRepository;
        $this->userRepository = $UserRepository;
    }

    public function index()
    {
        $datas = $this->configRepository->getData();
        $user = $this->userRepository->getDataRole('sale');
        return view(checkView('admin.config.index'), compact('datas','user'));
    }

    public function store(CreateRequest $request)
    {
        return response()->json($this->configRepository->storeData($request));
    }

    public function update(EditRequest $request,$id)
    {
        return response()->json($this->configRepository->UpdateData($request,$id));
    }

    public function show($id)
    {
        return response()->json($this->configRepository->showData($id));
    }
}
