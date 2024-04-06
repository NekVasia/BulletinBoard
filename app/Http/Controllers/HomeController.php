<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private const BB_VALIDATOR = [
        'title' => 'required|max:50',
        'content' => 'required',
        'price' => 'required|numeric',
        'image' => 'required'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('product', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function show()
    {
        return view('my_product', ['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function create()
    {
        return view('bb-create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'image' => $validated['image']
        ]);
        return redirect()->route('product');
    }

    public function edit(Bb $bb)
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    public function update(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'image' => $validated['image']
        ]);
        $bb->save();
        return redirect()->route('product');
    }

    public function delete(Bb $bb)
    {
        return view('bb-delete', ['bb' => $bb]);
    }

    public function destroy(Bb $bb)
    {
        $bb->delete();
        return redirect()->route('product');
    }
}
