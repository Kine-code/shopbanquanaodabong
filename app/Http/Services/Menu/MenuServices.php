<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class MenuServices
{

    // public function get($parent_id = 1)
    // {
    //     return Menu::
    //     where($parent_id == 0, function($query) use ($parent_id) {
    //         $query->where('parent_id', $parent_id);
    //     })
    //     ->get();
    // }
    public function getParent(){
        return Menu::where('parent_id', 0)->get();
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
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

    public function update($request, $menu): bool
    {
        if($request->input('parent_id') != $menu->id){
            $menu->parent_id =(int) $request->input('parent_id');
        }

        $menu->name =(string) $request->input('name');
        $menu->description =(string) $request->input('description');
        $menu->content =(string) $request->input('content');
        $menu->active =(string) $request->input('active');
      
        $menu->save();

        Session::flash('success', 'Cập nhật Danh Mục thành công');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if($menu){
            $menu = Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
    return true;

    }
}
