<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Http\Requests\Dashboard\Service\StoreServiceRequest;
use App\Http\Requests\Dashboard\Service\UpdateServiceRequest;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use File;
use Auth;

use App\Models\Service;
use App\Models\AdvantageService;
use App\Models\Tagline;
use App\Models\AdvantageUser;
use App\Models\ThumbnailService;
use App\Models\Order;
use App\Models\User;

class ServiceController extends Controller
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
        $services = Service::where('users_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('pages.dashboard.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.service.create');
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

        // add to advantage user
        foreach ($data['advantage-user'] as $key => $value) {
            $advantage_user = new AdvantageUser;
            $advantage_user->service_id = $service->id;
            $advantage_user->advantage = $value;
            $advantage_user->save();
        }

        // add to thumbnail service
        if($request->hasfile('thumbnail'))
        {
            foreach($request->file('thumbnail') as $file)
            {
                $path = $file->store(
                    'assets/service/thumbnail', 'public'
                );

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        // add to tagline
        if(count($data['tagline'])){
            foreach ($data['tagline'] as $key => $value) {
                $tagline = new Tagline;
                $tagline->service_id = $service->id;
                $tagline->tagline = $value;
                $tagline->save();
            }
        }

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
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $advantage_service = AdvantageService::where('service_id', $service['id'])->get();
        $tagline = Tagline::where('service_id', $service['id'])->get();
        $advantage_user = AdvantageUser::where('service_id', $service['id'])->get();
        $thumbnail_service = ThumbnailService::where('service_id', $service['id'])->get();

        return view('pages.dashboard.service.edit', compact('service', 'advantage_service', 'tagline', 'advantage_user', 'thumbnail_service'));
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
        // update to service
        $service->update($data);

        // update to advantage service
        $existingAdvantageServiceIds = $service->advantage_service()->pluck('id')->toArray();

        foreach ($data['advantage-services'] as $key => $value) {
            $advantage_service = AdvantageService::find($key);

            if ($advantage_service && $value !== '') {
                $advantage_service->advantage = $value;
                $advantage_service->save();
            }
            elseif ($advantage_service) {
                $advantage_service->delete();
            }

            $index = array_search($key, $existingAdvantageServiceIds);
            if ($index !== false) {
                unset($existingAdvantageServiceIds[$index]);
            }
        }

        AdvantageService::whereIn('id', $existingAdvantageServiceIds)->delete();

        //add new advantage service
        if(isset($data['advantage-service'])){
            foreach($data['advantage-service'] as $key => $value){
                if ($value !== '') {
                    $advantage_service = New AdvantageService;
                    $advantage_service->service_id = $service['id'];
                    $advantage_service->advantage = $value;
                    $advantage_service->save();
                }
            }
        }

        // update to advantage user
        $existingAdvantageUserIds = $service->advantage_user()->pluck('id')->toArray();

        foreach($data['advantage-users'] as $key => $value){
            $advantage_user = AdvantageUser::find($key);
            if ($advantage_user && $value !== '') {
                $advantage_user->advantage = $value;
                $advantage_user->save();
            }
            elseif($advantage_user){
                $advantage_user->delete();
            }

            $index = array_search($key, $existingAdvantageUserIds);
            if ($index !== false) {
                unset($existingAdvantageUserIds[$index]);
            }
        }

        AdvantageUser::whereIn('id', $existingAdvantageUserIds)->delete();

        //add new advantage user
        if(isset($data['advantage-user'])){
            foreach($data['advantage-user'] as $key => $value){
                if($value !== ''){

                    $advantage_user = New AdvantageUser;
                    $advantage_user->service_id = $service['id'];
                    $advantage_user->advantage = $value;
                    $advantage_user->save();
                }
            }
        }

        $existingTaglineIds = $service->tagline()->pluck('id')->toArray();

        // update to tagline
        foreach($data['taglines'] as $key => $value){
            echo "hai1";
            $tagline = Tagline::find($key);
            if($tagline && $value !== ''){
                echo "hai2";
                $tagline->tagline = $value;
                $tagline->save();
            }
            elseif($tagline){
                echo "hai3";
                $tagline->delete();
            }

            $index = array_search($key, $existingTaglineIds);
            if($index !== false){
                unset($existingTaglineIds[$index]);
            }
        }

        Tagline::whereIn('id', $existingTaglineIds)->delete();

        //add new tagline
        if(isset($data['tagline'])){
            echo "hai4";
            foreach($data['tagline'] as $key => $value){
                echo "hai5";
                if($value !== ''){
                    echo "hai6";
                    $tagline = New Tagline;
                    $tagline->service_id = $service['id'];
                    $tagline->tagline = $value;
                    $tagline->save();
                }
            }
        }
        echo "hai6";
        var_dump($data);
        // update to thumbnail service
        $existingThumbnail = $service->thumbnail_service()->pluck('id')->toArray();
        $thumbnailsToDelete = array_slice($existingThumbnail, 1);


        if($request->hasfile('thumbnails')){
            echo "hai7";
            foreach ($request->file('thumbnails') as $key => $file)
            {
                echo "hai8";
                $thumbnail_service = ThumbnailService::find($key);

                if($thumbnail_service){
                    echo "hai9";
                    // get old photo thumbnail
                    $get_photo = $thumbnail_service->thumbnail;

                    // store photo
                    $path = $file->store('assets/service/thumbnail', 'public');

                    // update thumbail
                    $thumbnail_service->thumbnail = $path;
                    $thumbnail_service->save();

                    // ini error kalau mau update thumbnail pertama
                    // if($thumbnailsToDelete->contains($key)){
                    //     $thumbnailsToDelete = $thumbnailsToDelete->diff([$key]);

                    //     if($get_photo && Storage::disk('public')->exists($get_photo)){
                    //         Storage::disk('public')->delete($get_photo);
                    //     }
                    // }

                    if (in_array($key, $thumbnailsToDelete)) {
                        $thumbnailsToDelete = array_diff($thumbnailsToDelete, [$key]);

                        if ($get_photo && Storage::disk('public')->exists($get_photo)) {
                            Storage::disk('public')->delete($get_photo);
                        }
                    }

                    var_dump($data);


                    // $data = 'storage/'.$get_photo['photo'];
                    // if(File::exists($data)){
                    //     echo "hai10";
                    //     File::delete($data);
                    // }else{
                    //     echo "hai11";
                    //     File::delete('storage/app/public/assets/service/thumbnail/'.$get_photo['photo']);
                    // }

                    // delete old photo thumbnail
                    // $data = 'storage/'.$get_photo['photo'];
                    // if(File::exists($data)){
                    //     File::delete($data);
                    // }else{
                    //     File::delete('storage/app/public/'.$get_photo['photo']);
                    // }
                }
                // delete old photo thumbnail
                // $data = 'storage/'.$get_photo['photo'];
                // if(File::exists($data)){
                //     File::delete($data);
                // }else{
                //     File::delete('storage/app/public/'.$get_photo['photo']);
                // }
            }
        }
        // ThumbnailService::whereIn('id', $thumbnailsToDelete)->delete();
        // ThumbnailService::whereIn('id', $thumbnailsToDelete)->delete();
        if (count($thumbnailsToDelete) > 0) {
            ThumbnailService::whereIn('id', $thumbnailsToDelete)->delete();
        }

        // add to thumbnail service
        if($request->hasfile('thumbnail')){
            echo "hai12";
            foreach($request->file('thumbnail') as $file)
            {
                echo "hai13";
                $path = $file->store('assets/service/thumbnail', 'public');

                $thumbnail_service = new ThumbnailService;
                $thumbnail_service->service_id = $service['id'];
                $thumbnail_service->thumbnail = $path;
                $thumbnail_service->save();
            }
        }

        toast()->success('Update has been success');
        return redirect()->route('member.service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(404);
    }
}
