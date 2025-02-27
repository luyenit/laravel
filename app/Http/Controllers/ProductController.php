<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // Truy vân + logic
        $objCate = new Category();
        $listCate = $objCate->loadAllCate();
        $arrayCate = [];
        foreach ($listCate as $value){
            $arrayCate[$value->id] = $value->name;
        }
        $this->view['listCate'] =  $arrayCate;
            ///
//        dd( $this->view['listCate']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
          //
          $objCate = new Category();
          $this->view['listCate'] = $objCate->loadAllCate();
          return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
          //
          $validate = $request->validate(
            [
               'name'=> ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1'],
                'quantity' => ['required', 'integer', 'min:1'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'category_id' => ['required', 'exists:categories,id']
            ],
            [
              'name.required'=>'Trường tên không được bỏ trống',
              'name.string'=>'Tên bắt buộc là chuỗi',
              'name.max'=>'Trường tên không được vượt quá 255 ký tự',

              'price.required'=>'Trường giá không được bỏ trống',
              'price.integer'=>'giá phải là số ',
              'price.min'=>'Trường giá không được nhỏ hơn 1',

              'quantity.required'=>'Trường số lượng không được bỏ trống',
              'quantity.integer'=>'số lượng  phải là số ',
              'quantity.min'=>'Trường số lượng  không được nhỏ hơn 1',

              'image.required'=>'Trường ảnh không được bỏ trống',
              'image.image'=>'Không phải ảnh',
              'image.mimes'=>'ảnh không đúng định dạng jpg,jpeg,png',
              'image.max'=>'Ảnh không được vượt quá 2MB',

              'category_id.required'=>'Trường danh mục không được bỏ trống',
                
            ]
        );
//        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
