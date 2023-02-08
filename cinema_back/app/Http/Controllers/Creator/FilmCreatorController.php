<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Http\Services\FilmService;
use App\Models\Film;
use App\Models\FilmFormat;
use App\Models\Genre;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;


class FilmCreatorController extends Controller
{
    public $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index()
    {
        $films = $this->filmService->get_films();
        $genres = Genre::select('id','title')
            ->get();

        return view('creator.films.index',compact('films','genres'));
    }

    public function create()
    {
        $genres = Genre::select('id','title')
            ->get();
        $formats = FilmFormat::select('id','title')
            ->get();
        return view('creator.films.credit',compact('genres','formats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => ['image', 'required'],
            'file' => ['mimes:mp4,mov,wmv,flv,avi,WebM,ogg', 'required']
        ]);

        $imagePath = request('image')->store('images', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->save();

        $file = request('file');
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $filePath = 'videos\/'. $filename;
        $file->move(public_path(). '/storage/videos/', $filename);

        $item = Film::add([
            'format_id' => $request['format_id'],
            'title' => $request['title'],
            'description' => $request['description'],
            'duration' => $request['duration'],
            'kdm' => $request['kdm'],
            'file' => $filePath,
            'image' => $imagePath,
        ]);

        $item->user_id = auth()->id();
        $item->isBoolean($request, 'is_active');
        $item->save();

        $item->setGenres($request->genres_id);

        return redirect()->route('creator.films.index')->with('success','Информация добавлена');
    }

    public function show($id)
    {
//        $item = Film::find($id);
    }

    public function edit($id)
    {
        $item = Film::find($id);
        $genres = Genre::select('id','title')
            ->get();
        $formats = FilmFormat::select('id','title')
            ->get();
        return view('creator.films.credit',compact('item','genres','formats'));
    }

    public function update(Request $request, $id)
    {
        $item = Film::find($id);
        $item->edit($request->all());
        $item->isBoolean($request,'is_active');
        $item->save();
        $item->setGenres($request->genres_id);
        return redirect()->route('creator.films.index')->with('success','Информация изменена');
    }

    public function destroy($id)
    {
        //
    }
}
