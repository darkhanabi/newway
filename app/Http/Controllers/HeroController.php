<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use \App\Hero;

class HeroController extends Controller
{
    /**
     * List all hero entries
     */
    public function listHeroes()
    {
        //Get all the database records
        $heroes = Hero::all();

        //Go to list page
        return view('list', ['heroes' => $heroes, 'title' => "Hall of Heroes | The Guild", 'route' => NULL]);
    }

    /**
     * Add a hero entry
     */
    public function addHero(Request $request)
    {
        //Validate fields
        $this->validate($request, [
            'name'         => 'bail|required|max:50',
            'class'        => 'bail|required|max:50',
            'role'         => 'bail|required|max:50',
            'hit_points'   => 'bail|required|max:4',
            'attack'       => 'bail|required|max:2',
            'defense'      => 'bail|required|max:2',
            'attack_speed' => 'bail|required|max:1',
            'move_speed'   => 'bail|required|max:2',
            'image'        => 'bail|required'
        ]);

        //Instance and define values
        $hero = new Hero;
        $hero->name         = $request['name'];
        $hero->class        = $request['class'];
        $hero->role         = $request['role'];
        $hero->hit_points   = $request['hit_points'];
        $hero->attack       = $request['attack'];
        $hero->defense      = $request['defense'];
        $hero->attack_speed = $request['attack_speed'];
        $hero->move_speed   = $request['move_speed'];
        //Insert into database
        $hero->save();

        //Validate and save image
        $file = Input::file('image');
        if ($file && $file->isValid()) {
            $fileExtension =$file->getClientOriginalExtension();
            $fileName = 'portrait_'.$hero->id.'.'.$fileExtension;
            $destinationPath = public_path(). '/images/portraits/';
            $file->move($destinationPath, $fileName);

            //Update hero record with image name
            $hero->image = $fileName;
            $hero->save();
        }

        //Redirect to list page
        return redirect('/');
    }

    /**
     * Delete a hero entry
     *
     * @param  int  $id
     * @return Response
     *
     */
    public function deleteHero($id)
    {
        //Instance
        $hero = Hero::find($id);

        //Delete image
        $imageName = $hero->image;
        if ($imageName && !empty($imageName)) {
            $imageFolder = public_path(). '/images/portraits';
            $imageFullPath = $imageFolder.'/'.$imageName;
            if (file_exists($imageFullPath)) {
                unlink($imageFullPath);
            }
        }

        //Delete from database
        $hero->delete();

        //Redirect to list page
        return redirect('/');
    }

    /**
     * Edit a hero entry
     *
     * @param  int  $id
     *
     */
    public function editHero(Request $request, $id)
    {
        $previousURL = $request->headers->get('referer') ?: '/';

        //Validade fields
        $this->validate($request, [
            'name'         => 'bail|required|max:50',
            'class'        => 'bail|required|max:50',
            'role'         => 'bail|required|max:50',
            'hit_points'   => 'bail|required|max:4',
            'attack'       => 'bail|required|max:2',
            'defense'      => 'bail|required|max:2',
            'attack_speed' => 'bail|required|max:1',
            'move_speed'   => 'bail|required|max:2',
        ]);

        //Instance and define values
        $hero = Hero::find($id);
        $hero->name         = $request['name'];
        $hero->class        = $request['class'];
        $hero->role         = $request['role'];
        $hero->hit_points   = $request['hit_points'];
        $hero->attack       = $request['attack'];
        $hero->defense      = $request['defense'];
        $hero->attack_speed = $request['attack_speed'];
        $hero->move_speed   = $request['move_speed'];
        //Update database
        $hero->save();

        //Validate and save image
        $file = Input::file('image');
        if ($file && $file->isValid()) {
            $fileExtension =$file->getClientOriginalExtension();
            $fileName = 'portrait_'.$hero->id.'.'.$fileExtension;
            $destinationPath = public_path(). '/images/portraits/';
            $file->move($destinationPath, $fileName);

            //Update hero record with image name
            $hero->image = $fileName;
            $hero->save();
        }

        //Redirect to list page
        return redirect($previousURL);
    }

    /**
     * Search for a hero entry
     */
    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $route = Route::getCurrentRoute()->uri();

        //Get from database
        $heroes = Hero::where('name', $keyword)->orWhere('class', $keyword)->orWhere('role', $keyword)->get();

        //Redirect to list page
        return view('list', ['heroes' => $heroes, 'title' => "Hall of Heroes | The Guild", 'route' => $route]);
    }

}