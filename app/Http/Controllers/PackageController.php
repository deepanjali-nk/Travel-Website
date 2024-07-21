<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageController extends Controller
{
    public function getPackages()
    {
        $packages = DB::table('packages')->paginate(5);

        return view('admin.sections.packages.packages', compact('packages'));
    }

    public function addPackagePage()
    {
        return view('admin.sections.packages.add-package');
    }

    public function addPackage(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'city' => 'required',
            'duration' => 'required',
            'persons' => 'required',
            'price' => 'required',
        ]);

        $requestData = $req->all();
        $fileName = time() . $req->file('image')->getClientOriginalName();
        $path = $req->file('image')->storeAs('images', $fileName, 'public');
        $requestData['imagePath'] = '/storage/' . $path;

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['city'] = preg_replace('/\s+/', ' ', $requestData['city']);
        $requestData['duration'] = preg_replace('/\s+/', ' ', $requestData['duration']);
        $requestData['persons'] = preg_replace('/\s+/', ' ', $requestData['persons']);
        $requestData['price'] = preg_replace('/\s+/', ' ', $requestData['price']);

        DB::table('packages')->insert([
            'name' => $requestData['name'],
            'city' => $requestData['city'],
            'duration' => $requestData['duration'],
            'persons' => $requestData['persons'],
            'price' => $requestData['price'],
            'imagePath' => $requestData['imagePath'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('packages')->with('success', 'Package added successfully');
    }

    public function editPackagePage(string $id)
    {
        $data = DB::table('packages')->find($id);
        return view('admin.sections.packages.update-package', compact('data'));
    }

    public function editPackage(Request $req, string $id)
    {
        $req->validate([
            'name' => 'required',
            'city' => 'required',
            'duration' => 'required',
            'persons' => 'required',
            'price' => 'required',
        ]);



        $requestData = $req->all();

        if ($req->hasFile('image')) {
            $fileName = time() . $req->file('image')->getClientOriginalName();
            $path = $req->file('image')->storeAs('images', $fileName, 'public');
            $requestData['imagePath'] = '/storage/' . $path;
        } else {
            $data = DB::table('packages')->find($id);
            $requestData['imagePath'] = $data->imagePath;
        }

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['city'] = preg_replace('/\s+/', ' ', $requestData['city']);
        $requestData['duration'] = preg_replace('/\s+/', ' ', $requestData['duration']);
        $requestData['persons'] = preg_replace('/\s+/', ' ', $requestData['persons']);
        $requestData['price'] = preg_replace('/\s+/', ' ', $requestData['price']);


        DB::table('packages')->where('id', $id)->update([
            'name' => $requestData['name'],
            'city' => $requestData['city'],
            'duration' => $requestData['duration'],
            'persons' => $requestData['persons'],
            'price' => $requestData['price'],
            'imagePath' => $requestData['imagePath'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('packages')->with('success', 'Package updated successfully');
    }

    public function deletePackage(string $id)
    {
        DB::table('packages')->where('id', $id)->delete();

        return redirect()->route('packages')->with('success', 'Package deleted successfully');
    }
}
