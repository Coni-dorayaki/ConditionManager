<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Conditions;

class ConditionController extends Controller
{
    public function add()
    {
        return view('user.condition.create');
    }

    public function create(Request $request)
    {
      $this->validate($request, Conditions::$rules);
      
      $condition = new Conditions;
      $form = $request->all();
      
      if (isset($form['image1'])) {
        $path = $request->file('image1')->store('public/image1');
        $condition->image1_path = basename($path);
      } else {
          $condition->image1_path = null;
      }

      unset($form['_token']);
      unset($form['image1']);
      
      if (isset($form['image2'])) {
        $path = $request->file('image2')->store('public/image2');
        $condition->image2_path = basename($path);
      } else {
          $condition->image2_path = null;
      }

      unset($form['_token']);
      unset($form['image2']);
      
      if (isset($form['image3'])) {
        $path = $request->file('image3')->store('public/image3');
        $condition->image3_path = basename($path);
      } else {
          $condition->image3_path = null;
      }

      unset($form['_token']);
      unset($form['image3']);
      
      $condition->fill($form);
      $condition->save();
      
      return redirect('user/condition/create');
    }

    public function edit()
    {
        return view('user.condition.edit');
    }

    public function update()
    {
        return redirect('user/condition/edit');
    }
}
