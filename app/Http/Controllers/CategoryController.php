<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Category();
        $this->view['listCate'] = $objPro->loadDataWithPager();
        // Truy vân + logic
        //  $objCate = new Category();
        //  $listCate = $objCate->loadAllCate();
        //  $arrayCate = [];
        //  foreach ($listCate as $value){
        //  $arrayCate[$value->id] = $value->name;
        //  }
        //  $this->view['listCate'] =  $arrayCate;
        ///
        //        dd( $this->view['listCate']);
        return view('category.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        //
        return view('category.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ////
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'status' => ['required', 'integer', 'min:1'],
            ],
            [
                'name.required' => 'Trường tên không được bỏ trống',
                'name.string' => 'Tên bắt buộc là chuỗi',
                'name.max' => 'Trường tên không được vượt quá 255 ký tự',

                'status.required' => 'Trường status không được bỏ trống',
                'status.integer' => 'status phải là số ',
                'status.min' => 'Trường status không được nhỏ hơn 1',

            ]
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
