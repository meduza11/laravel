<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\Task;
use App\Product;
use Illuminate\Http\Request;

/**
 * Вывести список всех задач
 */
Route::get('/', function () {
$products = Product::orderBy('created_at', 'asc')->get();
return view('products', [
'products' => $products
]);
});
/**
 * Добавить новую задачу
 */
Route::post('/product', function (Request $request) {
  $validator = Validator::make($request->all(), [
    'name' => 'required|max:255',
      'price' => 'required|integer',
      'discription' => 'required',
      'category' => 'required',
  ]);
  if ($validator->fails()) {
    return redirect('/')
      ->withInput()
      ->withErrors($validator);
  }
$product = new Product();
$product->name = $request->name;
$product->price = $request->price;
$product->discription = $request->discription;
$product->category = $request->category;
$product->save();
return redirect('/');
// Создание задачи...
});

/**
 * Удалить существующую задачу
 */
Route::post('/edit/{id}', function ($id) {
$product = Product::find($id);
return view('editProduct', [
'product' => $product
]);
});

Route::delete('/product/{id}', function ($id) {
Product::findOrFail($id)->delete();

return redirect('/');

});
Route::post('/save/{id}', function ($id, Request $request) {
$res = Product::find($id);
$res->name = $request->name;
$res->price = $request->price;
$res->discription = $request->discription;
$res->category = $request->category;
$res->save();
return redirect('/');

});
