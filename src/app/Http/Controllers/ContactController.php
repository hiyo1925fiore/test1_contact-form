<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        /*お問い合わせの種類名を取得 */
        $categories = Category::all();
        return view('index',compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel1', 'tel2', 'tel3','address', 'building', 'category_id','detail']);

        /*電話番号を連結して変数に格納 */
        $tel = $request->input('tel1') . $request->input('tel2') . $request->input('tel3');
        $contact['tel'] = $tel;

        /* 修正ボタン押下時、入力内容保持用に電話番号を変数に格納 */
        $tel1 = $request->input('tel1');
        $tel2 = $request->input('tel2');
        $tel3 = $request->input('tel3');

        session(['contact_data' => $contact]);

        $category = Category::find($contact['category_id']);

        return view('confirm',compact('contact','category'));
    }

    public function store(Request $request)
    {
        $contact = session('contact_data');

        /* 修正ボタン押下時の処理 */
        if($request->input('action') === 'back')
        {
            /*$tel = $request->input(['tel']);
            $tel1 = substr($tel, 0, strlen($request->input('tel1')));
            $tel2 = substr($tel, strlen($tel1), strlen($request->input('tel2')));
            $tel3 = substr($tel, strlen($tel1) + strlen($tel2)); */

            return redirect()->route('contact.index')
                    ->withInput($request->except(['tel'],'_token','action'));
        }

        $contact = $request->only(['last_name', 'first_name', 'gender', 'email', 'tel','address', 'building', 'category_id','detail']);

        Contact::create($contact);

        session()->forget('contact_data');

        return view('thanks');
    }
}