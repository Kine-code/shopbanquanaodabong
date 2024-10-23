<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MenuServices
{

    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }


    public function create($request)
    {
        try {
            Menu::create([
                'name'=>(string) $request->input('name'),
                'parent_id'=>(int) $request->input('parent_id'),
                'description'=>(string) $request->input('description'),
                'content'=>(string) $request->input('content'),
                'active'=>(string) $request->input('active')
            ]);
            Session::flash('success', 'Thêm Danh Mục thành công');
        } catch (\Exception $err) {

            Session::flash('error', 'Thêm Danh Mục thất bại');
            return false;
        }
        return true;
    }
}
