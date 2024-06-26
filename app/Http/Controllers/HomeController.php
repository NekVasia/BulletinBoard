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
        $path = $request->file('image')->store('uploads', 'public');
        Auth::user()->bbs()->create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
            'image' => $path
        ]);
        return redirect()->route('my_product');
    }

    public function edit(Bb $bb)
    {
        return view('bb-edit', ['bb' => $bb]);
    }

    public function update(Request $request, Bb $bb)
    {
        $validated = $request->validate(self::BB_VALIDATOR);
//        $path = $request->file('image')->store('uploads', 'public');
//        $bb->fill([
//            'title' => $validated['title'],
//            'content' => $validated['content'],
//            'price' => $validated['price'],
//            'image' => $path
//        ]);
        if ($request->file('image')) {
            $path = $request->file('image')->store('uploads', 'public');
        }
        $array = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price']
        ];
        if (isset($path)) {
            $array['image'] = $path;
        }
        $bb->fill($array);
        $bb->save();
        return redirect()->route('my_product');
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
