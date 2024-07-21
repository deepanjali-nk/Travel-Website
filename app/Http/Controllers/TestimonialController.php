<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function getTestimonials()
    {
        $testimonials = DB::table('testimonials')->paginate(3);

        return view('admin.sections.testimonials.testimonials', compact('testimonials'));
    }

    public function addTestimonialPage()
    {
        return view('admin.sections.testimonials.add-testimonial');
    }

    public function addTestimonial(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required',
            'testimonial' => 'required',
            'image' => 'required',
        ]);


        $requestData = $req->all();

        if ($req->hasFile('image')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $fileName = time() . $req->file('image')->getClientOriginalName();
                $path = $req->file('image')->storeAs('images', $fileName, 'public');
                $requestData['imagePath'] = '/storage/' . $path;
            } else {
                return redirect()->route('add-testimonial')->with('error', 'Please upload only image file');
            }
        }

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['position'] = preg_replace('/\s+/', ' ', $requestData['position']);
        $requestData['testimonial'] = preg_replace('/\s+/', ' ', $requestData['testimonial']);

        //handle the isPublished
        if (isset($requestData['isPublished'])) {
            $requestData['isPublished'] = 1;
        } else {
            $requestData['isPublished'] = 0;
        }

        DB::table('testimonials')->insert([
            'name' => $requestData['name'],
            'position' => $requestData['position'],
            'testimonial' => $requestData['testimonial'],
            'imagePath' => $requestData['imagePath'],
            'isPublished' => $requestData['isPublished'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('testimonials')->with('success', 'Testimonial added successfully');
    }

    public function editTestimonialPage(string $id)
    {
        $data = DB::table('testimonials')->find($id);
        return view('admin.sections.testimonials.update-testimonial', compact('data'));
    }

    public function editTestimonial(string $id, Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required',
            'testimonial' => 'required',
        ]);

        $requestData = $req->all();

        if ($req->hasFile('image')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $file = $req->file('image');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $fileName = time() . $req->file('image')->getClientOriginalName();
                $path = $req->file('image')->storeAs('images', $fileName, 'public');
                $requestData['imagePath'] = '/storage/' . $path;
            } else {
                return redirect()->route('edit-testimonial', ['id' => $id])->with('error', 'Please upload only image file');
            }
        } else {
            $data = DB::table('testimonials')->find($id);
            $requestData['imagePath'] = $data->imagePath;
        }

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['position'] = preg_replace('/\s+/', ' ', $requestData['position']);
        $requestData['testimonial'] = preg_replace('/\s+/', ' ', $requestData['testimonial']);

        //handle the isPublished
        if (isset($requestData['isPublished'])) {
            $requestData['isPublished'] = 1;
        } else {
            $requestData['isPublished'] = 0;
        }

        DB::table('testimonials')->where('id', $id)->update([
            'name' => $requestData['name'],
            'position' => $requestData['position'],
            'testimonial' => $requestData['testimonial'],
            'imagePath' => $requestData['imagePath'],
            'isPublished' => $requestData['isPublished'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('testimonials')->with('success', 'Testimonial updated successfully');
    }

    public function deleteTestimonial(string $id)
    {
        DB::table('testimonials')->where('id', $id)->delete();

        return redirect()->route('testimonials')->with('success', 'Testimonial deleted successfully');
    }
}
