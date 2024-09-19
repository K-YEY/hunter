<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    public function index(){
        $faqs = FAQ::paginate(15);
        return view('dashboard.tables.widgets.index',compact('faqs'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq = FAQ::findOrFail($request->input('id'));
        if(!$faq){
            return redirect()->route('admin.faq')->with('error', 'FAQ not found!');
        }

        $faq->question = $request->input('question');
        $faq->answer = $request->input('answer');
        $faq->save();

        return redirect()->route('admin.faq')->with('success', 'FAQ updated successfully!');
    }
}
