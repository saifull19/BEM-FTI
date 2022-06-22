<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Service\UpdateServiceRequest;
use App\Http\Requests\Dashboard\Service\StoreServiceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Respponse;

use Illuminate\Support\Facades\File;
use Auth;

use App\Models\Service;
use App\Models\AdvantageService;
use App\Models\AdvantageUser;
use App\Models\Tagline;
use App\Models\ThumbnailService;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use App\Models\Materi;



class ServiceController extends Controller
{

    public function __construc()
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
        // order by untuk updet yg terbaru berada diatas 'desc' => 'descending'
        // eloquest service
        $services = Service::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $category = Category::all();

        return view('pages.dashboard.service.index', compact('services', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.service.create', [
            'category' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $request)
    {
        $data = $request->all();
        $data['users_id'] = Auth::user()->id;

        // add to service
        $service = Service::create($data);

        // add to advantage service
        foreach ($data['advantage-service'] as $key => $value) {
            $advantage_service = new AdvantageService;
            $advantage_service->service_id = $service->id;
            $advantage_service->advantage = $value;
            $advantage_service->save();
        }
        
        // add to advantage service
        // foreach ($data['materi'] as $key => $value) {
        //     $materi = new Materi;
        //     $materi->service_id = $service->id;
        //     $materi->title = $value;
        //     $materi->save();
        // }

        // add to avantage user 
        // foreach ($data['advantage-user'] as $key => $value) {
        //     $advantage_user = new AdvantageUser;
        //     $advantage_user->service_id = $service->id;
        //     $advantage_user->advantage = $value;
        //     $advantage_user->save();
        // }

        // add to thumbnail service "melakukan pengecekan terlebih dulu apakah file tersebut ada atau tidak"
        if ($request->hasfile('thumbnail')) {
            foreach ($request->file('thumbnail') as $file) {
                $path = $file->store('assets/service/thumbnail', 'public');

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        // add to tagline
        if (count($data['tagline'])) {
            foreach ($data['tagline'] as $key => $value) {
                $tagline = new Tagline;
                $tagline->service_id = $service->id;
                $tagline->tagline = $value;
                $tagline->save(); 
            }
        }

        // toast untuk sweetalert
        toast()->success('Save has been success');
        return redirect()->route('member.service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $materi = Materi::where('service_id', $service['id'])->get();
        $advantage_service = AdvantageService::where('service_id', $service['id'])->get();
        $tagline = Tagline::where('service_id', $service['id'])->get();
        $advantage_user = AdvantageUser::where('service_id', $service['id'])->get();
        $thumbnail_service = ThumbnailService::where('service_id', $service['id'])->get();
        // $category = Category::all();

        return view('pages.dashboard.service.edit', compact('service','materi', 'advantage_service', 'advantage_user', 'thumbnail_service', 'tagline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->all();
       
        // updateto service
        $service->update($data);

        // update to materi 
        // foreach ($data['materis'] as $key => $value) {
        //     $materi = Materi::find($key);
        //     $materi->title = $value;
        //     $materi->save();
        // }

        // add new materi 
        // if (isset($data['materi'])) {
        //     foreach ($data['materi'] as $key => $value) {
        //         $materi = new Materi;
        //         $materi->service_id = $service['id'];
        //         $materi->title = $value;
        //         $materi->save();
        //     }
        // }

        // update to advantage service
        foreach ($data['advantage-services'] as $key => $value) {
            $advantage_service = AdvantageService::find($key);
            $advantage_service->advantage = $value;
            $advantage_service->save();
        }

        // add new advantage service
        if (isset($data['advantage-service'])) {
            foreach ($data['advantage-service'] as $key => $value) {
                $advantage_service = new AdvantageService;
                $advantage_service->service_id = $service['id'];
                $advantage_service->advantage = $value;
                $advantage_service->save();
            }
        }

        // update to advantage user
        // foreach ($data['advantage-users'] as $key => $value) {
        //     $advantage_user = AdvantageUser::find($key);
        //     $advantage_user->advantage = $value;
        //     $advantage_user->save();
        // }

        // add new advantage user
        // if (isset($data['advantage-user'])) {
        //     foreach ($data['advantage-user'] as $key => $value) {
        //         $advantage_user = new AdvantageUser;
        //         $advantage_user->service_id = $service['id'];
        //         $advantage_user->advantage = $value;
        //         $advantage_user->save();
        //     }
        // }

        // updateto tagline
        foreach ($data['taglines'] as $key => $value) {
            $tagline = Tagline::find($key);
            $tagline->tagline = $value;
            $tagline->save();
        }

        // add new tagline
        if (isset($data['tagline'])) {
            foreach ($data['tagline'] as $key => $value) {
                $tagline = new Tagline;
                $tagline->service_id = $service['id'];
                $tagline->tagline = $value;
                $tagline->save();
            }
        }

        // update thumbnail service yang sudah ada
        if ($request->hasfile('thumbnails')) {
            foreach ($request->file('thumbnails') as $key => $file) {
                // get old photo thumbnail
                $get_photo = ThumbnailService::where('id', $key)->first();

                // store photo
                $path = $file->store('assets/service/thumbnail', 'public');
                
                // update thumbnail
                $thumbnail_service = ThumbnailService::find($key);
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();

                // delete old photo
                $data = 'storage/'.$get_photo['photo'];
                if (File::exist($data)) {
                    File::delete($data);
                } else {
                    File::delete('storage/app/public/'.$get_photo['photo']);
                }
                
            }

        }

        // Add to thumbnail service
        if ($request->hasfile('thumbnail')) {
            foreach ($request->file('thumbnail') as $file) {
                $path = $file->store('assets/service/thumbnail', 'public');

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        toast()->success('Update has been succes');
        return redirect()->route('member.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        Service::destroy($service->id);

        toast()->success('Deleted has been success');
        return redirect()->route('member.service.index');
    }

    public function materi(Service $service)
    {
        return view('pages.dashboard.service.materi', compact('service'));
    }
}
