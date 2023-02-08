<?php


namespace App\Http\Services;


use App\Models\Film;

class FilmService
{
    public function get_films()
    {
        $filmsQuery = Film::where('user_id', auth()->id())->with('genres','user');

        if(isset($_GET['time'])){
            if($_GET['time'] != 'all'){
                $filmsQuery = $filmsQuery->where('created_at','>',now()->addMonth(-$_GET['time']));
            }
        }else{
            $filmsQuery = $filmsQuery->where('created_at','>',now()->addMonth(-1));
        }
        // $filmsQuery = isset($_GET['time'])
        //     ? $_GET['time'] != 'all'
        //         ? $filmsQuery->where('created_at','>',now()->addMonth(-$_GET['time']))
        //         : $filmsQuery
        //     : $filmsQuery->where('created_at','>',now()->addMonth(-1));

        $films = $filmsQuery->get();

        return $films;
    }

    public function films_active()
    {
        $filmsQuery = Film::where('is_active',1)
            ->orderBy('title')
            ->with('genres','user');

        $films = $filmsQuery->get();

        return $films;
    }
}
