<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    public function getFaqs()
    {
        $faqs = DB::table('faqs')->paginate(8);

        return view('admin.sections.faqs.faqs', compact('faqs'));
    }

    public function addFaqPage()
    {
        return view('admin.sections.faqs.add-faq');
    }

    public function addFaq(Request $req)
    {

        $req->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $cleanedAnswer = preg_replace('/\s+/', ' ', $req->answer);
        $cleanedQuestion = preg_replace('/\s+/', ' ', $req->question);

        DB::table('faqs')->insert([
            'question' => $cleanedQuestion,
            'answer' => $cleanedAnswer,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('faqs')->with('success', 'Faq added successfully');
    }

    public function editFaqPage(string $id)
    {
        $data = DB::table('faqs')->find($id);
        return view('admin.sections.faqs.update-faq', compact('data'));
    }

    public function editFaq(Request $req, string $id)
    {

        $req->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $cleanedAnswer = preg_replace('/\s+/', ' ', $req->answer);
        $cleanedQuestion = preg_replace('/\s+/', ' ', $req->question);

        DB::table('faqs')->where('id', $id)->update([
            'question' => $cleanedQuestion,
            'answer' => $cleanedAnswer,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('faqs')->with('success', 'Faq updated successfully');
    }

    public function deleteFaq(string $id)
    {
        DB::table('faqs')->where('id', $id)->delete();

        return redirect()->route('faqs')->with('success', 'Faq deleted successfully');
    }
}
