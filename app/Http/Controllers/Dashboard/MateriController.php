<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Materi\StoreMateriRequest;
use App\Http\Requests\Materi\UpdateMateriRequest;

use Illuminate\Support\Facades\Auth;
use App\Models\DetailMateri;
use App\Models\Service;
use App\Models\Materi;

class MateriController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $materi = Materi::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.materi.index', compact('materi', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;
        // add to advantage service
        Materi::create($data);



        // foreach ($data['description'] as $key => $value) {
        //     $detail_materi = new DetailMateri;
        //     $detail_materi->materi_id = $materi->id;
        //     $detail_materi->description = $value;
        //     $detail_materi->save();
        // }

        // toast untuk sweetalert
        toast()->success('Created Data has been success');
        return redirect()->route('member.materi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        // $service = Service::where('id', $id)->first();
        
        // $materi = Materi::where('id', $materi)->get();
        // $detail_materi = DetailMateri::where('materi_id', $materi['id'])->get();

        return view('pages.dashboard.materi.detail', compact('materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        
        $detail_materi = DetailMateri::where('materi_id', $materi['id'])->get();
        return view('pages.dashboard.materi.edit', compact('materi', 'detail_materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriRequest $request, Materi $materi)
    {
        

        $data = $request->all();

        // updateto service
        $materi->update($data);

        // Materi::where('id', $materi)->update($data);

        // add new materi 

        // update to materi 
        
        // foreach ($data['detail-materi'] as $key => $value) {
        //     $detail_materi = new DetailMateri;
        //     $detail_materi->materi_id = $materi['id'];
        //     $detail_materi->description = $value;
        //     $detail_materi->save();
        // }
        // if (isset($data['detail-materis'])) {
            
        //     foreach ($data['detail-materis'] as $key => $value) {
                
        //         $detail_materi = DetailMateri::find($key);
        //         $detail_materi->description = $value;
        //         $detail_materi->save();
        //     }
        // }




        toast()->success('Update has been succes');
        return redirect()->route('member.materi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        Materi::destroy($materi->id);

        toast()->success('Deleted has been success');
        return redirect()->route('member.materi.index');
    }
}
