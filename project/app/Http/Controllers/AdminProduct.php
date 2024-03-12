<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminProduct extends Controller
{
    //ดึงข้อมูล
    function dataProduct()
    {
        $dataProductAll = Product::all();
        return view('home', compact('dataProductAll'));
    }

    function listData()
    {
        $listDataAll = Product::all();
        return view('list', compact('listDataAll'));
    }


    //เพิ่มข้อมูล
    function addData(Request $request)
    {
        $request->validate([
            'pd_name' => 'required',
            'pd_price' => 'required',
            'pd_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        //ทำการตั้งชื่อไฟล์ และตามด้วยนามสกุลไฟล์ โดยไม่ซ้ำกัน
        if ($request->hasFile('pd_img')) {
            $image = $request->file('pd_img');
            $nameImg = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $nameImg);
        }
        //เพิ่มข้อมูล
        DB::table('products')->insert([
            'pd_name' => $request->pd_name,
            'pd_price' => $request->pd_price,
            'pd_img' => 'img/' . $nameImg,
        ]);
        $dataProductAll = Product::all();
        return view('home', compact('dataProductAll'));
    }


    //แก้ไขข้อมูล
    function editData($id)
    {
        $editDataId = Product::find($id);
        return view('edit', compact('editDataId'));
    }

    //อัพข้อมูลแทนที่อันเก่า
    function updateData(Request $request, $id)
    {
        $productData = Product::find($id);
        $request->validate([
            'pd_name' => 'required',
            'pd_price' => 'required',
            'pd_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // อัปโหลดรูปภาพใหม่ (ถ้ามี)
        if ($request->hasFile('pd_img')) {
            $image = $request->file('pd_img');
            $nameImg = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img'), $nameImg);

            // ลบรูปเก่า (ถ้ามี)
            if ($productData->pd_img) {
                unlink(public_path($productData->pd_img));
            }

            // อัปเดตข้อมูล
            $productData->update([
                'pd_name' => $request->pd_name,
                'pd_price' => $request->pd_price,
                'pd_img' => 'img/' . $nameImg,
            ]);
            $listDataAll = Product::all();
            return view('list', compact('listDataAll'));
        } else {
            // อัปเดตข้อมูล (ไม่มีการอัปโหลดรูป)
            $productData->update([
                'pd_name' => $request->pd_name,
                'pd_price' => $request->pd_price,
            ]);
            $listDataAll = Product::all();
            return view('list', compact('listDataAll'));
        }
    }


    //ลบข้อมูล
    function deleteData($id)
    {
        $data = Product::find($id);

        if ($data) {
            // จะเป็นการลบไฟล์รูปที่อยู่ใน public
            unlink(public_path($data->pd_img));

            $data->delete();

            $listDataAll = Product::all();
            return view('list', compact('listDataAll'));
        }
    }
}
