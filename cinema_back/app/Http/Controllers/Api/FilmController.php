<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\FilmService;
use App\Models\Film;
use App\Models\Seance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use const http\Client\Curl\AUTH_ANY;

class FilmController extends Controller
{
    public $filmService;

    public function __construct(FilmService $filmService)
    {
        $this->filmService = $filmService;
    }

    public function index()
    {
        return Film::orderBy('created_at', 'desc')->get();
    }
    public function myFilms()
    {
        return Film::where('user_id', Auth::id())->get();
    }

    public function getMyFilmsForFinance(){
        $films = Film::where('user_id', Auth::id())->with('user')->get();
        $seances = [];
        foreach ($films as $film){
            $seance = Seance::where('film_id', $film->id)->get();
            array_push($seances, $seance);
        }
        return response()->json(['films' => $films, 'seances' => $seances]);
    }

    public function getMySeances(){
        $seances = Seance::where('user_id', Auth::id())->with('user')->get();
        return response()->json(['seances' => $seances]);
    }

    public function store(Request $request)
    {
        $files = $request->all();
//
//        $imagePath = request('image')->store('images', 'public');
//        dd(public_path("storage/$imagePath"));
//        $image = Image::make(public_path("storage/$imagePath"));
//        $image->save();



        $request->validate([
            'title' => 'required',
            'image' => ['image', 'required'],
            'certificate_image' => ['image', 'required'],
            'law_image' => ['image', 'required'],
            'description' => 'required',
        ]);
        if ($files['image']) {
            $file_name = time() . '_' . $files['image']->getClientOriginalName();
            $files['image']->store('public/images');
            $file_path = 'images/' . $file_name;
            $files['image']->move(public_path() . '/storage/images', $file_name);
        }
        if ($files['certificate_image']) {
            $file_name_certificate = time() . '_' . $files['certificate_image']->getClientOriginalName();
            $files['certificate_image']->store('public/images');
            $file_path_certificate = 'images/' . $file_name_certificate;
            $files['certificate_image']->move(public_path() . '/storage/images', $file_name_certificate);
        }
        if ($files['law_image']) {
            $file_name_law = time() . '_' . $files['law_image']->getClientOriginalName();
            $files['law_image']->store('public/images');
            $file_path_law = 'images/' . $file_name_law;
            $files['law_image']->move(public_path() . '/storage/images', $file_name_law);
        }
        if(request('file')){
            $file = request('file');
            $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->store('public/videos');
            $filePath = 'videos/' . $filename;
            $file->move(public_path() . '/storage/videos/', $filename);
        }
        $item = Film::add([
            'format_id' => $request['format_id'],
            'platform' => $request['platform'],
            'title' => $request['title'],
            'description' => $request['description'],
            'duration' => $request['duration'],
            'file' => $filePath,
            'image' => $file_path,
            'certificate_image' => $file_path_certificate,
            'law_image' => $file_path_law,
        ]);

        $item->user_id = auth()->id();

        if ($item->save()) {
            $str_arr = explode(",", $request->genres_id);
            $item->setGenres($str_arr);

            return response()->json([
                'success' => true,
                'item' => $item,
            ]);
        }

        return response()->json(['errors' => 'Film was not saved'], 500);
    }

    public function show($id)
    {
        $film = Film::where('id', $id)->with('genres',  'user')->first();
        if($film['user_id'] == Auth::id()){
            return response()->json(['film' => $film, 'success' => 'success']);
        }else{
            return response()->json(['film' => $film]);
        }
//        return $film;
    }

//    public function checkFilmOwner($id){
//        $film = Film::where('id', $id);
//    }

    public function filmForCounter($id){
        $film = Film::where('id', $id)->where('user_id', Auth::id())->with('genres',  'user')->first();
        return $film;
    }

    public function redirect(){
        return response()->json(['NotVerifiedDocuments'], 200);
    }

    public function setRating(Request $request){
        $sum_rating = 0;

        $info = $request->all();
        $film = Film::where('id', $info['id'])->first();
        $all_rating = json_decode($film->rating_all);
        array_push($all_rating, $info['rating']);
//        Film::where('id', $info['id'])->update(['rating_all' => $all_rating]);
        foreach($all_rating as $value){
            $sum_rating += $value;
        }
        $final_rating = $sum_rating / count($all_rating);
        Film::where('id', $info['id'])->update(['rating' => $final_rating, 'rating_all' => $all_rating]);

        return response()->json(['rating' => $final_rating]);
    }
//    public function checkRoleFunction(){
//        if(Auth::user()->role_id == 4 || Auth::user()->role_id == 5 ){
//            return response()->json('ok', 200);
//        }else{
//            return response()->json(['roleFail' => 'У вас нет права']);
//        }
//
//    }

}
