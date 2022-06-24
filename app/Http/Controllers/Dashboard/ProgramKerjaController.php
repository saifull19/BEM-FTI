<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Requests\Program\UpdateProgramRequest;
use Symfony\Component\HttpFoundation\Respponse;

use Auth;
use App\Models\ProgramKerja;
use App\Models\DetailProgramKerja;
use Illuminate\Http\Request;

class ProgramKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $program = ProgramKerja::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('pages.dashboard.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        // add to service
        $program = ProgramKerja::create($data);

        // add to advantage service
        foreach ($data['program_kerja'] as $key => $value) {
            $program_kerja = new DetailProgramKerja;
            $program_kerja->devisi_id = $program->id;
            $program_kerja->program_kerja = $value;
            $program_kerja->save();
        }

        // toast untuk sweetalert
        toast()->success('Created Data has been success');
        return redirect()->route('member.program.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramKerja  $programKerja
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramKerja $program)
    {
        
        $detail = DetailProgramKerja::where('devisi_id', $program['id'])->get();

        return view('pages.dashboard.program.detail', compact('program', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramKerja  $programKerja
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramKerja $program)
    {
        $detail_program = DetailProgramKerja::where('devisi_id', $program['id'])->get();
        // $category = Category::all();

        return view('pages.dashboard.program.edit', compact('program', 'detail_program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramKerja  $programKerja
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, ProgramKerja $program)
    {
        $data = $request->all();

        // updateto service
        $program->update($data);

        // Materi::where('id', $materi)->update($data);

        // add new materi 

        // update to materi 
        
        foreach ($data['details'] as $key => $value) {
            
            
            $detail_program = DetailProgramKerja::find($key);
            $detail_program->program_kerja = $value;
            $detail_program->save();
        }
        if (isset($data['detail'])) {
            
            foreach ($data['detail'] as $key => $value) {
                $detail_program = new DetailProgramKerja();
            $detail_program->devisi_id = $program['id'];
            $detail_program->program_kerja = $value;
            $detail_program->save();
            }
        }




        toast()->success('Update has been succes');
        return redirect()->route('member.program.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramKerja  $programKerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramKerja $program)
    {
        // ProgramKerja::destroy($program->id);
        ProgramKerja::destroy($program->id);

        toast()->success('Deleted has been success');
        return redirect()->route('member.program.index');
    }
}
