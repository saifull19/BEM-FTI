<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\DetailProgramKerja;
use Illuminate\Http\Request;

class DetailProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailProgramKerja  $detailProgramKerja
     * @return \Illuminate\Http\Response
     */
    public function show(DetailProgramKerja $detailProgramKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailProgramKerja  $detailProgramKerja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = DetailProgramKerja::where('id', $id)->first();
        // $webinarStatus = WebinarStatus::all();
        return view('pages.dashboard.detail-program.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailProgramKerja  $detailProgramKerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $rules = [
            'program_kerja' => 'required|string|max:255',
            'status' => 'required|string|max:255'
        ];

        $validatedData = $request->validate($rules);

        DetailProgramKerja::where('id', $id)->update($validatedData);
        
        // Add to thumbnail service
        // if ($request->hasfile('thumbnail')) {
        //     foreach ($request->file('thumbnail') as $file) {
        //         $path = $file->store('assets/webinar/thumbnail', 'public');

        //         $thumbnail_webinar = new ThumbnailWebinar;
        //         $thumbnail_webinar->webinar_id = $webinar['id'];
        //         $thumbnail_webinar->thumbnail = $path;
        //         $thumbnail_webinar->save();
        //     }
        // }

        toast()->success('Update has been succes');
        return redirect()->route('member.program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailProgramKerja  $detailProgramKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailProgramKerja $detail)
    {
        // ProgramKerja::destroy($programKerja->id);
        DetailProgramKerja::destroy($detail->id);

        toast()->success('Deleted has been success');
        return redirect()->route('member.program.index');
    }
}
