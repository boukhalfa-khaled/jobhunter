<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ListringController extends Controller
{
    public function index(Request $request)
    {
        $listings = Listing::where('is_active', true) 
            ->with(['tags', 'employer'])
            ->latest()
            ->get();

        $tags = Tag::orderBy('name')->get();

        if($request->has('s') ){
            $query = strtolower($request->get('s'));
            $listings = $listings->filter(function($listing) use($query){
                if (Str::contains(strtolower($listing->title), $query)){
                    return true;
                }

                if (Str::contains(strtolower($listing->employer->name), $query)){
                    return true;
                }

                if (Str::contains(strtolower($listing->location), $query)){
                    return true;
                }

                if (Str::contains(strtolower($listing->tags), $query)){
                    return true;
                }

                return false;
            });
        }

        if ( $request->has('tag') ){
            $tag  = $request->get('tag');
            $listings = $listings->filter(function($listing) use ($tag){
                return $listing->tags->contains('slug', $tag);
            });
        }
        
        return view('listings.index',compact('listings', 'tags'));
    }


    public function show(Listing $listing, Request $request){
        return view('listings.show', compact('listing'));
    }

    public function apply(Listing $listing, Request $request)
    {
        $listing->clicks()
        ->create([
            'user_agent' => $request->userAgent(),
            'ip'  => $request->ip()
        ]);
        return redirect()->to($listing->apply_link);
    }


    public function create(){
        return view('listings.create');
    }

    public function post(Request $request){

        $md = new \ParsedownExtra();

        $validatedAttributes = $request->validate([
            'title'      => ['required'],
            'salary'     => ['required'],
            'location'   => ['required'],
            'schedule'   => ['required'],
            'apply_link' => ['required', 'url'], 
            'content'    => ['required'],
            'tags' => ['nullable']
        ]);                
        $listing = Auth::user()->employer->listings()->create([
            'title' => $request->title,
            'slug' =>  Str::slug($request->title) . '-' . rand(1111,9999),  
            'location'  => $request->location,
            'salary' => $request->salary,
            'schedule' => $request->schedule,
            'apply_link' => $request->apply_link,
            'content' => $md->text($request->input('content')),
            'is_active' => true
        ]);

        if($request['tags'])
        {
            foreach(explode(',', $validatedAttributes['tags']) as $requestTag){
                $tag = Tag::firstOrCreate([
                    'slug' => Str::slug(trim($requestTag))
                ],[
                    'name' => ucwords(trim($requestTag))
                ]);
                $listing->tags()->attach($tag);
            }
        }

    }

    public function toggleActive(Listing $listing){
        // dd($listing);
        $listing->is_active = !$listing->is_active;
        $listing->save();

        return redirect('dashboard');
    }
}
