<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function getTeams()
    {
        $teams = DB::table('teams')->paginate(3);

        return view('admin.sections.teams.teams', compact('teams'));
    }

    public function addTeamPage()
    {
        return view('admin.sections.teams.add-team');
    }

    public function addTeam(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required',
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
                return redirect()->route('add-team')->with('error', 'Please upload only image file');
            }
        }

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['position'] = preg_replace('/\s+/', ' ', $requestData['position']);


        if (empty($requestData['facebook'])) {
            $requestData['facebook'] = null;
        } else {
            $requestData['facebook'] = preg_replace('/\s+/', ' ', $requestData['facebook']);
        }
        if (empty($requestData['twitter'])) {
            $requestData['twitter'] = null;
        } else {
            $requestData['twitter'] = preg_replace('/\s+/', ' ', $requestData['twitter']);
        }
        if (empty($requestData['instagram'])) {
            $requestData['instagram'] = null;
        } else {
            $requestData['instagram'] = preg_replace('/\s+/', ' ', $requestData['instagram']);
        }
        if (empty($requestData['linkedin'])) {
            $requestData['linkedin'] = null;
        } else {
            $requestData['linkedin'] = preg_replace('/\s+/', ' ', $requestData['linkedin']);
        }

        if (isset($requestData['isPublished'])) {
            $requestData['isPublished'] = 1;
        } else {
            $requestData['isPublished'] = 0;
        }

        DB::table('teams')->insert([
            'name' => $requestData['name'],
            'position' => $requestData['position'],
            'imagePath' => $requestData['imagePath'],
            'facebook' => $requestData['facebook'],
            'twitter' => $requestData['twitter'],
            'instagram' => $requestData['instagram'],
            'linkedin' => $requestData['linkedin'],
            'isPublished' => $requestData['isPublished'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('teams')->with('success', 'Team member added successfully');
    }

    public function editTeamPage($id)
    {
        $data = DB::table('teams')->find($id);

        return view('admin.sections.teams.update-team', compact('data'));
    }

    public function editTeam(String $id, Request $req)
    {
        $req->validate([
            'name' => 'required',
            'position' => 'required',
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
                return redirect()->route('edit-team', ['id' => $id])->with('error', 'Please upload only image file');
            }
        } else {
            $data = DB::table('teams')->find($id);
            $requestData['imagePath'] = $data->imagePath;
        }

        //cleaned data
        $requestData['name'] = preg_replace('/\s+/', ' ', $requestData['name']);
        $requestData['position'] = preg_replace('/\s+/', ' ', $requestData['position']);

        if (empty($requestData['facebook'])) {
            $requestData['facebook'] = null;
        } else {
            $requestData['facebook'] = preg_replace('/\s+/', ' ', $requestData['facebook']);
        }
        if (empty($requestData['twitter'])) {
            $requestData['twitter'] = null;
        } else {
            $requestData['twitter'] = preg_replace('/\s+/', ' ', $requestData['twitter']);
        }
        if (empty($requestData['instagram'])) {
            $requestData['instagram'] = null;
        } else {
            $requestData['instagram'] = preg_replace('/\s+/', ' ', $requestData['instagram']);
        }
        if (empty($requestData['linkedin'])) {
            $requestData['linkedin'] = null;
        } else {
            $requestData['linkedin'] = preg_replace('/\s+/', ' ', $requestData['linkedin']);
        }

        if (isset($requestData['isPublished'])) {
            $requestData['isPublished'] = 1;
        } else {
            $requestData['isPublished'] = 0;
        }

        DB::table('teams')->where('id', $id)->update([
            'name' => $requestData['name'],
            'position' => $requestData['position'],
            'imagePath' => $requestData['imagePath'],
            'facebook' => $requestData['facebook'],
            'twitter' => $requestData['twitter'],
            'instagram' => $requestData['instagram'],
            'linkedin' => $requestData['linkedin'],
            'isPublished' => $requestData['isPublished'],
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('teams')->with('success', 'Team member updated successfully');
    }

    public function deleteTeam(String $id)
    {
        DB::table('teams')->where('id', $id)->delete();

        return redirect()->route('teams')->with('success', 'Team member deleted successfully');
    }
}
