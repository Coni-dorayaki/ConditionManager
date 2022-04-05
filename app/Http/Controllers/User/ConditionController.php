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
      
      return redirect('user/condition');
    }
    
    public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          $posts = Conditions::whereMonth('created_at', $cond_title)->get();
      } else {
          $posts = Conditions::all();
      }
      return view('user.condition.index', ['posts' => $posts, 'cond_title' => $cond_title]);
      
    }

    public function edit(Request $request)
    {
      $condition = Conditions::find($request->id);
      if (empty($condition)) {
        abort(404);    
      }
      return view('user.condition.edit', ['condition_form' => $condition]);
      }


  public function update(Request $request)
  {
      $this->validate($request, Conditions::$rules);
      
      $condition = Conditions::find($request->id);
      
      $condition_form = $request->all();
      unset($condition_form['_token']);
      
      if ($request->remove == 'true') {
          $condition_form['image1_path'] = null;
      } elseif ($request->file('image1')) {
          $path = $request->file('image1')->store('public/image1');
          $condition_form['image1_path'] = basename($path);
      } else {
          $condition_form['image1_path'] = $condition->image1_path;
      }
      
      if ($request->remove == 'true') {
          $condition_form['image2_path'] = null;
      } elseif ($request->file('image2')) {
          $path = $request->file('image2')->store('public/image2');
          $condition_form['image2_path'] = basename($path);
      } else {
          $condition_form['image2_path'] = $condition->image2_path;
      }
      
      if ($request->remove == 'true') {
          $condition_form['image3_path'] = null;
      } elseif ($request->file('image3')) {
          $path = $request->file('image3')->store('public/image3');
          $condition_form['image3_path'] = basename($path);
      } else {
          $condition_form['image3_path'] = $condition->image3_path;
      }

      unset($condition_form['image']);
      unset($condition_form['remove']);
      unset($condition_form['_token']);
      
      $condition->fill($condition_form)->save();

      return redirect('user/condition');
    }
    
    public function delete(Request $request)
    {
      $condition = Conditions::find($request->id);
      $condition->delete();
      
      return redirect('user/condition/');
    }  
  }
