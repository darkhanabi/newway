<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Hero;

class HeroApiController extends Controller
{
	/**
     * List all hero entries
     */
    public function listHeroes() {
    	return Hero::all();;
    }

    /**
     * Get a hero entry
     *
     */
    public function getHero($id) {
    	//Check if the id is numeric and greater than zero
    	if (preg_match('/^[1-9][0-9]*$/', $id) && $id > 0) {
    		//Check if the entry exists on database
    		if ($hero = Hero::find($id)) {
    			return $hero;
    		} else {
    			return response()->json([
    				'error' => 'Hero not found'
    			], 404);
    		}
		} else {
			return response()->json([
            	'error' => 'Please type a numeric ID'
        	], 400);
		}
    }

    /**
     * Add a hero entry
     *
     */
    public function addHero(Request $request) {
    	$hero = Hero::create($request->all());

        return response()->json($hero, 201);
    }

    /**
     * Edit a hero entry
     *
     */
    public function editHero(Request $request, $id)
    {
    	//Check if the id is numeric and greater than zero
    	if (preg_match('/^[1-9][0-9]*$/', $id) && $id > 0) {
    		//Check if the entry exists on database
    		if ($hero = Hero::find($id)) {
    			$hero->update($request->all());
        		return response()->json($hero, 200);
    		} else {
    			return response()->json([
    				'error' => 'Hero not found'
    			], 404);
    		}
		} else {
			return response()->json([
            	'error' => 'Please type a numeric ID'
        	], 400);
		}
    }

    /**
     * Delete a hero entry
     *
     */
    public function deleteHero($id)
    {
    	//Check if the id is numeric and greater than zero
    	if (preg_match('/^[1-9][0-9]*$/', $id) && $id > 0) {
    		//Check if the entry exists on database
    		if ($hero = Hero::find($id)) {
    			//Delete image
		        $imageName = $hero->image;
		        if ($imageName && !empty($imageName)) {
		            $imageFolder = public_path(). '/images/portraits';
		            $imageFullPath = $imageFolder.'/'.$imageName;
		            if (file_exists($imageFullPath)) {
		                unlink($imageFullPath);
		            }
		        }
    			$hero->delete();
    			
    			return response()->json(null, 204);
    		} else {
    			return response()->json([
    				'error' => 'Hero not found'
    			], 404);
    		}
		} else {
			return response()->json([
            	'error' => 'Please type a numeric ID'
        	], 400);
		}
    }
}
