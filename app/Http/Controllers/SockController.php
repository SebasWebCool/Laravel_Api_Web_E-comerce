<?php

namespace App\Http\Controllers;

use App\Models\Sock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

/**
 * Class SockController
 * @package App\Http\Controllers
 */
class SockController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socks = Sock::paginate();

        return view('sock.index', compact('socks'))
            ->with('i', (request()->input('page', 1) - 1) * $socks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sock = new Sock();
        return view('sock.create', compact('sock'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $sock = Sock::create($request->all());

        if($request->hasFile('sock_image')){
        
            $imageName = $request->file('sock_image')->getClientOriginalName();
            $sock['image'] = $imageName;

            $sock->save();
        
            $path = $request->file('sock_image')->storeAs(
                '/public', $imageName
            );
            
        }
        request()->validate(Sock::$rules);




        return redirect()->route('socks.index')
            ->with('success', 'Sock created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        $sock = Sock::find($id);

        return view('sock.show', compact('sock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sock = Sock::find($id);

        return view('sock.edit', compact('sock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Sock $sock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sock $sock)
    {
        request()->validate(Sock::$rules);

        $sock->update($request->all());

        return redirect()->route('socks.index')
            ->with('success', 'Sock updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sock = Sock::find($id)->delete();

        return redirect()->route('socks.index')
            ->with('success', 'Sock deleted successfully');
    }
}
