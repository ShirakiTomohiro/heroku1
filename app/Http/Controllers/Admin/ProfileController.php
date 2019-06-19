<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profiles;
use App\Historie;
use Carbon\Carbon;

class ProfileController extends Controller
{
    // 以下を追記
  public function add()
  {
      return view('admin.profile.create');
  }
  public function create(Request $request)
  {
    // Validationを行う
    $this->validate($request, Profiles::$rules);

    $profiles = new Profiles;
    $form = $request->all();


   // フォームから送信されてきた_tokenを削除する
    unset($form['_token']);


    //データベースに保存する
    $profiles->fill($form);
    $profiles->save();

    return redirect('admin/profile/create');
  }

  public function index(Request $request)
  {
     $cond_title = $request->cond_title;
     if ($cond_title != '') {
         //検索されたら検索結果を取得する
         $posts = Profiles::where('title', $cond_title)->get();
    } else {
        // それ以外はすべてのニュースを取得する
        $posts = Profiles::all();
    }
    return view ('admin.profile.index', ['posts' => $posts, 'cond_title' =>$cond_title]);
  }

  public function edit(Request $request)
  {
      // Profile Modelからデータを所得する
      $profiles = Profiles::find($request->id);
print_r($profiles);
      if (empty($profiles)) {
        //abort(404);
      }
      return view('admin.profile.edit', ['profiles_form' => $profiles]);
  }

  public function update(Request $request)
  {
    // Validationをかける
    $this->validate($request,Profiles::$rules);
    // Profile Modelからデータを取得する
    $profiles = Profiles::find($request->id);
    // 送信されてきたフォームデータを格納する
    $profiles_form = $request->all();

     unset($profiles_form['_token']);
     unset($profiles_form['remove']);

    // 該当するデータを上書きして保存する
      $profiles->fill($profiles_form)->save();

      //以下を追記
      $histories = new Historie;
      $histories->profiles_id = $profiles->id;
      $histories->edited_at = Carbon::now();
      $histories->save();

    return redirect('admin/profile/edit?id='.$request->id);
  }

  // 以下を追記
  public function delete(Request $request)
  {
    // 該当するProfiles Modelを取得
    $profiles = Profiles::find($request->id);
    // 削除する
    $profiles->delete();
    return redirect('admin/profile/edit?id='.$request->id);
  }

}
