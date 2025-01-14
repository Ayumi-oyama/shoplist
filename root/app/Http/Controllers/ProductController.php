<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreproductRequest;
use App\Http\Requests\UpdateproductRequest;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 一覧画面
        //   id 降順でレコードセットを取得(Illuminate\Pagination\LengthAwarePaginator)
        $products = product::orderByDesc('id')->paginate(20);
        return view('admin.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 新規画面
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreproductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreproductRequest $request)
    {
        // 新規登録
        $product = product::create([
            'name' => $request->name
        ]);
        return redirect(
            route('admin.products.show', ['product' => $product])
        )->with('messages.success', '新規登録が完了しました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
                // 詳細画面
                return view('admin.products.show', [
                    'product' => $product,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
                // 編集画面
                return view('admin.products.edit', [
                    'product' => $product,
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateproductRequest  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function confirm(UpdateproductRequest $request, product $product)
    {
                // 更新確認画面
                $product->name = $request->name;
                return view('admin.products.confirm', [
                    'product' => $product,
                ]);
    }
    public function update(UpdateproductRequest $request, product $product)
    {
        // 更新
        $product->name = $request->name;
        $product->update();
        return redirect(
            route('admin.products.show', ['product' => $product])
        )->with('messages.success', '更新が完了しました。');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
    // 削除
        $product->delete();
        return redirect(route('admin.products.index'));
    }
}
