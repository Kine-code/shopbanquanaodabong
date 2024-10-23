<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuServices;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuServices;

    public function __construct(MenuServices $menuServices)
    {
        $this->menuServices = $menuServices;
    }

    public function create()
    {

        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuServices->getParent()
        ]);
    }

    public function store(CreateFormRequest $request)
    {
        $result = $this->menuServices->create($request);

        return redirect()->back();
    }
}
