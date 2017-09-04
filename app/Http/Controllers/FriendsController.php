<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Friend;

use App\Http\Requests\StoreFriendRequest;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

use App\User;

class FriendsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city = $request->input('city', null);
        $sex = $request->input('gender', null); // TODO: eloquent scope'ai

        // 1. gauti iš DB pasinaudojant modeliu Friend
        $friends = Auth::user()
                       ->friends()
                       ->with('photo') // eager loading
                       ->orderBy('created_at', 'desc');

        // 2. jeigu yra GET parametrai, galima juos panaudoti ir filtruoti duomenis
        if ($city)
            $friends->where('city', $city);

        if ($sex) {
            $friends->where('sex', $sex); // gender
        }

        $friends = $friends->paginate(5);

        // 3. grąžinti view template, kuriame atvaizduojamas įrašų sąrašas
        return view('friends.index', [
            'friends' => $friends
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('friends.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFriendRequest $request)
    {
        $data = $request->except(['photo']);

        $friend = Auth::user()->friends()->create($data);

        // Jeigu yra įkelta nuotrauka, ją kuriame kaip atskirą objektą
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/friend_photos');

            $photo = $friend->photo()->create([
                'filename' => $path
            ]);
        }

        $request->session()->flash('success_msg', 'Įrašas buvo sukurtas sėkmingai!');

        // nukreipk mane į naujai sukurtą įrašą
        return redirect()->route('friends.show', $friend->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Friend $friend)
    {
        return view('friends.show')->with('friend', $friend);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // TODO: patikrinti, ar priklauso useriui
        $friend = Friend::find($id);

        return view('friends.edit')->with('friend', $friend);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFriendRequest $request, $id)
    {
        // TODO: patikrinti, ar priklauso useriui

        // atnaujinti friends įrašą
        $friend = Friend::find($id);

        $data = $request->except(['photo']);
        $friend->update($data);

        if ($request->hasFile('photo')) {
            // Įkeliama nauja nuotrauką į storage folderį
            $path = $request->file('photo')->store('public/friend_photos');

            // Ištriname seną nuotrauką ir įrašą iš duomenų bazės
            Storage::delete($friend->photo->filename);
            $friend->photo->delete();

            // Sukuriame naują nuotraukos įrašą duomenų bazėje
            $photo = $friend->photo()->create([
                'filename' => $path
            ]);
        }

        $request->session()->flash('success_msg', 'Įrašas buvo atnaujintas!');

        return redirect()->route('friends.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // TODO: patikrinti, ar priklauso useriui

        // 1 būdas
        // Friend::destroy($id);

        // 2 būdas
        $friend = Friend::findOrFail($id);

        Storage::delete($friend->photo->filename);
        $friend->photo->delete();

        $friend->delete();

        $request->session()->flash('success_msg', 'Įrašas buvo pašalintas!');

        return redirect()->route('friends.index');
    }
}
