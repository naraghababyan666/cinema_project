<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Models\DocumentEais;
use App\Models\DocumentEaisForClient;
use App\Models\DocumentForHolders;
use App\Models\Film;
use App\Models\Hall;
use App\Models\HallsInDocument;
use App\Models\UploadDocs;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use PhpParser\Node\Stmt\DeclareDeclare;
use function GuzzleHttp\Promise\all;
use const http\Client\Curl\AUTH_ANY;

class HallController extends Controller
{

//    public function uploadData(Request $request){
////        $a = $request->all();
//        foreach($request->all() as $req){
//            if($req === null || $req == []){
//                return response()->json(['error' => 'Проверьте правильность заполненной формы']);
//            }
//        }
////                        dd($request);
//        $hall_type = '';
//        $photo_array = [];
//        $input = $request->file();
//        $num = 1;
//        $person_photo = [];
//        $new_hall_scheme_photo = [];
//        $new_hall_cresel_photo = [];
//        $new_hall_voice_photo = [];
//        $new_hall_photo = [];
//        $filtered = [];
////        dd($input);
////        foreach ($input as $item){
////            for($i = 0; $i < 1; $i++){
//                $personPhotoStr = 'person_photo';
//                $newHallSchemePhotoStr = 'new_hall_scheme_photo';
//                $newHallCreselPhotoStr = 'new_hall_cresel_photo';
//                $newHallVoicePhotoStr = 'new_hall_voice_photo';
//                $newHallPhotoStr = 'new_hall_photo';
//                $keys = array_keys($request->file());
//                foreach($keys as $key){
////                    dd(strpos($key, $str));
//                    if ($request->file()) {
//                        $file_name = time() . '_' . $input[$key]->getClientOriginalName();
////                        $path = $input[$key]->store('media_library', 'public');
//                        $path = 'media_library/'. $file_name;
//                        $input[$key]->move(public_path().'/storage/media_library', $file_name);
//                        $a = [$key => $path];
////                        $file_path = $input[$key]->storeAs('media_library', $file_name);
////                        $path = [$key => $file_path];
////                        $img = Image::make(public_path("storage/media_library/{$path}"));
////                        $file_path->move(public_path() . '/storage/media_library/', $file_name);
//                        array_push($photo_array, $a);
//                        $num++;
////                        dd($img);
//                    }
//
//                }
//                foreach($photo_array as $photo){
//                    $k = key($photo);
//                    if(strpos($k, $personPhotoStr) !== false){
//                        array_push($person_photo, $photo);
////                        array_splice($photo_array, key($photo), 1);
//                        $index = array_search($photo, $photo_array);
//                        unset($photo_array[$index]);
//                    }else if (strpos($k, $newHallSchemePhotoStr) !== false){
//                        array_push($new_hall_scheme_photo, $photo);
//                        $index = array_search($photo, $photo_array);
//                        unset($photo_array[$index]);
//                    }else if (strpos($k, $newHallCreselPhotoStr) !== false){
//                        array_push($new_hall_cresel_photo, $photo);
//                        $index = array_search($photo, $photo_array);
//                        unset($photo_array[$index]);
//                    }else if (strpos($k, $newHallVoicePhotoStr) !== false){
//                        array_push($new_hall_voice_photo, $photo);
//                        $index = array_search($photo, $photo_array);
//                        unset($photo_array[$index]);
//                    }else if (strpos($k, $newHallPhotoStr) !== false){
//                        array_push($new_hall_photo, $photo);
//                        $index = array_search($photo, $photo_array);
//                        unset($photo_array[$index]);
//                    }
////                        $f = key($photo);
//
//                };
//                foreach($photo_array as $filter){
//                    array_push($filtered, $filter);
//                }
//
//            UploadDocs::create([
//            'user_id' => Auth::user()->id,
//            'hall_type' => $request['hall_type'],
//            'personName' => $request['personName'],
//            'document_ogrn_text' => $request['documents_first_doc_text'],
//            'document_ogrn_photo' => $filtered[0]['documents_first_doc_photo'],
//            'document_protocol_text' => $request['documents_second_doc_text'],
//            'document_protocol_photo' => $filtered[1]['documents_second_doc_photo'],
//            'document_charter_text' => $request['documents_third_doc_text'],
//            'document_charter_photo' => $filtered[2]['documents_third_doc_photo'],
//            'address' => $request['address'],
//            'person_name' => $request['person_name'],
//            'person_photo' => json_encode($person_photo),
//            'payment_order_name' => $request['payment_order_name'],
//            'payment_order_card' => $request['payment_order_card'],
//            'payment_inn' => $request['payment_inn'],
//            'payment_kpp' => $request['payment_kpp'],
//            'payment_bik' => $request['payment_bik'],
//            'description_name_hall' => $request['description_name_hall'],
//            'description_seat_count' => $request['description_seat_count'],
//            'description_row_count' => $request['description_row_count'],
//            'description_scheme_photo' => $filtered[3]['description_scheme_photo'],
//            'description_scheme_width' => $request['description_scheme_width'],
//            'description_scheme_length' => $request['description_scheme_length'],
//            'description_scheme_height' => $request['description_scheme_height'],
//            'description_cresel_photo' => $filtered[4]['description_cresel_photo'],
//            'description_voice_input' => $request['description_voice_input'],
//            'description_voice_photo' => $filtered[5]['description_voice_photo'],
//            'description_screen_width' => $request['description_screen_width'],
//            'description_screen_length' => $request['description_screen_length'],
//            'description_photo' => $filtered[6]['description_photo'],
//            'new_hall_name' => $request['new_hall_name'],
//            'new_hall_scheme_photo' => json_encode($new_hall_scheme_photo),
//            'new_hall_width' => $request['new_hall_width'],
//            'new_hall_length' => $request['new_hall_length'],
//            'new_hall_height' => $request['new_hall_height'],
//            'new_hall_cresel_photo' => json_encode($new_hall_cresel_photo),
//            'new_hall_hardware_description' => $request['new_hall_voice_desc'],
//            'new_hall_hardware_photo' => json_encode($new_hall_voice_photo),
//            'new_hall_screen_width' => $request['new_hall_screen_width'],
//            'new_hall_screen_length' => $request['new_hall_screen_length'],
//            'new_hall_photo' => json_encode($new_hall_photo),
//        ]);
//        $info = $request->all();
//        HallsInDocument::create([
//            'user_id' => Auth::id(),
//            'name_hall' => $info['description_name_hall'],
//            'address' => $info['address'],
//            'hall_width' => $info['description_scheme_width'],
//            'hall_length' => $info['description_scheme_length'],
//            'hall_height' => $info['description_scheme_height'],
//            'hall_seats' => $info['description_seat_count'] * $info['description_row_count'],
//            'hall_rows' => $info['description_row_count'],
//            'voice_hardware' => $info['description_voice_input'],
//            'screen_width' => $info['description_screen_width'],
//            'screen_length' => $info['description_screen_length'],
//        ]);
//        User::where('email', Auth::user()->email)->update(['document_verified' => 1]);
//        return response()->json(['success' => ' Ваш документы успешно отправлено админку EXTRACINEMA']);
//    }

    public function getMyDocument(){
        $doc = UploadDocs::where('user_id', Auth::id())->first();
        return response()->json(['document' => $doc]);
    }

    public function uploadData(Request $request){
        if(UploadDocs::where('user_id', Auth::id())->first() !== null){
            $document = UploadDocs::where('user_id', Auth::id())->first();
            $id = $document->id;

            $files = $request->file();
            $photo_array = [];
            $new_hall_scheme_photo = [];
            $new_hall_voice_photo = [];
            $person_photo = [];
            $filtered = [];
            $personPhotoStr = 'person_photo';
            $newHallSchemePhotoStr = 'new_hall_scheme_photo';
            $newHallVoicePhotoStr = 'new_hall_voice_photo';

            $keys = array_keys($request->file());
            foreach($keys as $key){
                if ($request->file()) {
                    $files[$key]->store('public/images');
                    $file_name = Carbon::now()->timestamp . '_' . $files[$key]->getClientOriginalName();
                    $files[$key]->move(public_path().'/storage/images', $file_name);
                    $a = [$key => $file_name];

//                        $file_path = $input[$key]->storeAs('media_library', $file_name);
//                        $path = [$key => $file_path];
//                        $img = Image::make(public_path("storage/media_library/{$path}"));
//                        $file_path->move(public_path() . '/storage/media_library/', $file_name);
                    array_push($photo_array, $a);
//                $num++;
                }
            }
            foreach($photo_array as $photo){
                $k = key($photo);
                if(strpos($k, $personPhotoStr) !== false){
                    array_push($person_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }else if (strpos($k, $newHallSchemePhotoStr) !== false){
                    array_push($new_hall_scheme_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }else if (strpos($k, $newHallVoicePhotoStr) !== false){
                    array_push($new_hall_voice_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }
            };
            foreach($photo_array as $filter){
                array_push($filtered, $filter);
            }
            if($filtered) {
                UploadDocs::findOrFail($id)->update([
                    'document_ogrn_photo' => $filtered[0]['documents_first_doc_photo'],
                ]);
            }
            $ooo = [];
            if($person_photo){
                $current_doc = UploadDocs::where('user_id', Auth::id())->first();
                $current_photo = $current_doc['person_photo'];
                foreach (json_decode($current_photo) as $photoNameInModel){
                    $photoNameInModel = (array) $photoNameInModel;
//                    array_push($person_photo, $photoNameInModel);

                    $keyInModel = key($photoNameInModel);

                    foreach($person_photo as $photoNameInFront){
//                        dd($photoNameInModel, $photoNameInFront, array_keys($photoNameInModel) === array_keys($photoNameInFront));
                        if(array_keys($photoNameInModel) === array_keys($photoNameInFront)){
                            $photoNameInFront = $photoNameInModel;
//                            array_push($ooo, $photoNameInFront);
//                            array_push($person_photo, $photoNameInModel);
                        }

//                        $t = array_search($keyInModel, array_keys($photoNameInFront));
//                        if($t !== false){
//                            array_push($person_photo, $photoNameInModel);
//                        }

//                        dd($t, $keyInModel, $photoNameInFront);
//                        $keyInFront = key($photoNameInFront);
//                        if(key($photoNameInModel) !== $keyInFront){
////                            $photoNameInFront = $photoNameInModel;
//
//                            array_push($person_photo, $photoNameInModel);
//                        }

                    }
                }
//dd($person_photo);
//                dd(json_decode($current_photo) as $person_photo);
//                array_push( $new_hall_scheme_photo, json_decode($current_photo));
                UploadDocs::where('user_id', Auth::id())->update([
                'person_photo' => json_encode($person_photo),
                    ]);
            }
            if($new_hall_scheme_photo){

                UploadDocs::findOrFail($id)->update([
                'new_hall_scheme_photo' => json_encode($new_hall_scheme_photo),
                    ]);
            }
            if($new_hall_voice_photo){
                UploadDocs::where('user_id', Auth::id())->update([
                'new_hall_hardware_photo' => json_encode($new_hall_voice_photo),
                    ]);
            }
            UploadDocs::findOrFail($id)->update([
                'hall_type' => $request['hall_type'],
                'personName' => $request['personName'],
                'name_theatre' => $request['name_theatre'],
                'document_ogrn_text' => $request['documents_first_doc_text'],
                'region' => $request['region'],
                'city' => $request['city'],
                'house' => $request['house'],
                'person_name' => $request['person_name'],
                'person_position' => $request['person_position'],
                'new_hall_name' => $request['new_hall_name'],
                'new_hall_row_count' => json_encode($request['new_hall_row_count']),
                'new_hall_seat_count' => json_encode($request['new_hall_seat_count']),
                'new_hall_hardware_description' => $request['new_hall_voice_desc'],
                'new_hall_screen_width' => $request['new_hall_screen_width'],
                'new_hall_screen_length' => $request['new_hall_screen_length'],
            ]);
//            $info = $request->all();
//            for($i=0; $i<$request['hall_count']+1; $i++){
//                HallsInDocument::create([
//                    'user_id' => Auth::id(),
//                    'name_hall' => json_decode($request['new_hall_name'])[$i],
//                    'region' => $info['region'],
//                    'city' => $info['city'],
//                    'house' => $info['house'],
//                    'hall_seats' => json_decode($request['new_hall_seat_count'])[$i] * json_decode($request['new_hall_row_count'])[$i],
//                    'hall_rows' => json_decode($request['new_hall_row_count'])[$i],
//                    'voice_hardware' => json_decode($request['new_hall_voice_desc'])[$i],
//                    'screen_width' => json_decode($request['new_hall_screen_width'])[$i],
//                    'screen_length' => json_decode($request['new_hall_screen_length'])[$i],
//                ]);
//            }
//            User::where('email', Auth::user()->email)->update(['document_verified' => 1]);
            return response()->json(['success' => ' Ваш документы успешно отправлено админку EXTRACINEMA']);
        }else{
            foreach($request->all() as $req){
                if($req === null || $req == []){
                    return response()->json(['error' => 'Проверьте правильность заполненной формы']);
                }
            }
            $photo_array = [];
            $files = $request->file();
            $num = 1;
            $person_photo = [];
            $new_hall_scheme_photo = [];
            $new_hall_voice_photo = [];
            $filtered = [];

            $personPhotoStr = 'person_photo';
            $newHallSchemePhotoStr = 'new_hall_scheme_photo';
            $newHallVoicePhotoStr = 'new_hall_voice_photo';

//        if($file){
//            $files['file']->store('public/videos');
//            $filename = Carbon::now()->timestamp . '_' . $files['file']->getClientOriginalName();
//            $files['file']->move(public_path().'/storage/videos', $filename);
//        }
            $keys = array_keys($request->file());
            foreach($keys as $key){
                if ($request->file()) {
                    $files[$key]->store('public/images');
                    $file_name = Carbon::now()->timestamp . '_' . $files[$key]->getClientOriginalName();
                    $files[$key]->move(public_path().'/storage/images', $file_name);
                    $a = [$key => $file_name];

//                        $file_path = $input[$key]->storeAs('media_library', $file_name);
//                        $path = [$key => $file_path];
//                        $img = Image::make(public_path("storage/media_library/{$path}"));
//                        $file_path->move(public_path() . '/storage/media_library/', $file_name);
                    array_push($photo_array, $a);
//                $num++;
                }
            }
            foreach($photo_array as $photo){
                $k = key($photo);
                if(strpos($k, $personPhotoStr) !== false){
                    array_push($person_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }else if (strpos($k, $newHallSchemePhotoStr) !== false){
                    array_push($new_hall_scheme_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }else if (strpos($k, $newHallVoicePhotoStr) !== false){
                    array_push($new_hall_voice_photo, $photo);
                    $index = array_search($photo, $photo_array);
                    unset($photo_array[$index]);
                }
            };
            foreach($photo_array as $filter){
                array_push($filtered, $filter);
            }
            UploadDocs::create([
                'user_id' => Auth::user()->id,
                'hall_type' => $request['hall_type'],
                'personName' => $request['personName'],
                'name_theatre' => $request['name_theatre'],
                'document_ogrn_text' => $request['documents_first_doc_text'],
                'document_ogrn_photo' => $filtered[0]['documents_first_doc_photo'],
                'region' => $request['region'],
                'city' => $request['city'],
                'house' => $request['house'],
                'person_name' => $request['person_name'],
                'person_position' => $request['person_position'],
                'person_photo' => json_encode($person_photo),
                'new_hall_name' => $request['new_hall_name'],
                'new_hall_scheme_photo' => json_encode($new_hall_scheme_photo),
                'new_hall_row_count' => json_encode($request['new_hall_row_count']),
                'new_hall_seat_count' => json_encode($request['new_hall_seat_count']),
                'new_hall_hardware_description' => $request['new_hall_voice_desc'],
                'new_hall_hardware_photo' => json_encode($new_hall_voice_photo),
                'new_hall_screen_width' => $request['new_hall_screen_width'],
                'new_hall_screen_length' => $request['new_hall_screen_length'],
            ]);




            $info = $request->all();
            for($i=0; $i<$request['hall_count']+1; $i++){
                HallsInDocument::create([
                    'user_id' => Auth::id(),
                    'name_theatre' => $info['name_theatre'],
                    'name_hall' => json_decode($request['new_hall_name'])[$i],
                    'region' => $info['region'],
                    'city' => $info['city'],
                    'house' => $info['house'],
                    'hall_seats' => json_decode($request['new_hall_seat_count'])[$i] * json_decode($request['new_hall_row_count'])[$i],
                    'hall_rows' => json_decode($request['new_hall_row_count'])[$i],
                    'voice_hardware' => json_decode($request['new_hall_voice_desc'])[$i],
                    'screen_width' => json_decode($request['new_hall_screen_width'])[$i],
                    'screen_length' => json_decode($request['new_hall_screen_length'])[$i],
                ]);
            }
            User::where('email', Auth::user()->email)->update(['document_verified' => 1]);
            return response()->json(['success' => ' Ваш документы успешно отправлено админку EXTRACINEMA']);

        }
        }

    public function uploadEaisDataForClient(){
        $user = Auth::user();
        $hall = HallsInDocument::where('user_id', Auth::id())->first();
        DocumentEaisForClient::create([
            'hall_id' => $hall['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'country_code' => $user['country_code'],
            'phone' => $user['phone'],
        ]);

        return response()->json(['success' => 'successfully send']);
    }

    public function uploadEaisData(Request $request){
        $docs = $request->all();
        foreach ($docs as $doc){
            if($doc == [] || $doc == ''){
                return response()->json(['fail' => 'Failure']);
            }
        }
        DocumentEais::create([
            'user_id' => Auth::id(),
            'date_of_completion' => $docs['date_of_completion'],
            'demonistrator_film_name' => $docs['demonistrator_film_name'],
            'id_hall' => $docs['id_hall'],
            'cinema_network_name' => $docs['cinema_network_name'],
            'cinema_network_id' => $docs['cinema_network_id'],
            'cinema_network_email' => $docs['cinema_network_email'],
            'legal_entity_name' => $docs['legal_entity_name'],
            'legal_entity_address' => $docs['legal_entity_address'],
            'ogrn_code' => $docs['ogrn_code'],
            'inn' => $docs['inn'],
            'demonistrator_film_region' => $docs['demonistrator_film_region'],
            'demonistrator_film_city' => $docs['demonistrator_film_city'],
            'demonistrator_film_locality' => $docs['demonistrator_film_locality'],
            'demonistrator_film_street' => $docs['demonistrator_film_street'],
            'demonistrator_film_email' => $docs['demonistrator_film_email'],
            'telephone_fax' => $docs['telephone_fax'],
            'demonistrator_film_site' => $docs['demonistrator_film_site'],
            'autoinformer_number' => $docs['autoinformer_number'],
            'full_name' => $docs['full_name'],
            'name_and_hardware_name_hall' => $docs['name_and_hardware_name_hall'],
            'name_and_hardware_seats_in_hall' => $docs['name_and_hardware_seats_in_hall'],
            'name_and_hardware_support' => $docs['name_and_hardware_support'],
            'hardware_projector_manufacturer' => $docs['hardware_projector_manufacturer'],
            'hardware_projector_model' => $docs['hardware_projector_model'],
            'hardware_projector_serial_number' => $docs['hardware_projector_serial_number'],
            'hardware_server_manufacturer' => $docs['hardware_server_manufacturer'],
            'hardware_server_model' => $docs['hardware_server_model'],
            'hardware_server_serial_number' => $docs['hardware_server_serial_number'],
            'hardware_type_name_hall' => $docs['hardware_type_name_hall'],
            'hardware_type' => $docs['hardware_type'],
            'hardware_type_other_settings' => $docs['hardware_type_other_settings'],
            'hardware_type_add_date' => $docs['hardware_type_add_date'],
            'voice_hardware_name_hall' => $docs['voice_hardware_name_hall'],
            'voice_hardware_analog_manufacturer' => $docs['voice_hardware_analog_manufacturer'],
            'voice_hardware_analog_model' => $docs['voice_hardware_analog_model'],
            'voice_hardware_digital_manufacturer' => $docs['voice_hardware_digital_manufacturer'],
            'voice_hardware_digital_model' => $docs['voice_hardware_digital_model'],
            'ticketing_software_manufacturer' => $docs['ticketing_software_manufacturer'],
            'placement_demonistration_film' => $docs['regularity'],
            'regularity_film_showing' => $docs['placement'],
        ]);

        return response()->json(['success' => 'Successfully added']);
    }

    public function checkHolderForm(Request $request){
        $photo = $request->file();
        $files = $request->all();
        if ($request->file()) {
            $file_name = time() . '_' . $photo['photo']->getClientOriginalName();
            $photo['photo']->store('public/media_library');
            $path_name = 'media_library/'. $file_name;
            $photo['photo']->move(public_path().'/storage/media_library', $file_name);
        }
        DocumentForHolders::create([
            'user_id' => Auth::id(),
            'form_type' => $files['form_type'],
            'name' => $files['name'],
            'passport' => &$path_name,
        ]);

        User::where('id', Auth::id())->update(['document_verified' => 1]);
        return response()->json(['success' => 'Ваш документы успешно отправлено админку EXTRACINEMA']);
    }

    public function index()
    {
        return HallsInDocument::where('user_id', Auth::id())->get();
    }

    public function getMyAdvertisements(){
        $advertisings = Advertising::where('user_id', Auth::id())->where('verified', 1)->get();
        return response()->json(['advertisements' => $advertisings]);
    }

    public function getPersons(){
        $halls = HallsInDocument::where('user_id', Auth::id())->get();
        $docs = UploadDocs::where('user_id', Auth::id())->get();
        if($docs){
            return response()->json(['user'=>$docs, 'halls'=>$halls]);
        }
        return response()->json(['fail' => 'No data']);
    }

    public function getPassport(Request $request){
        $current = [];
        $docs = UploadDocs::where('user_id', Auth::id())->get();
        $photos = json_decode($docs[$request['parent']]['person_photo']);
        $current = $photos[$request['child']];
        return response()->json($current);
    }

    public function getHalls(){
        $halls = HallsInDocument::where('user_id', Auth::id())->get();
        return response()->json($halls);
    }

    public function getFilms(){
        $films = Film::orderBy('rating', 'desc')->get();

        return response()->json($films);
    }

    public function myAdvertisement(){
        $advertisements = Advertising::where('user_id', Auth::id())->get();

        return response()->json(['advertisements' => $advertisements]);
    }

    public function getAdvertisement(Request $request){
        $advertisements = [];
        $data = $request->all();
        foreach ($data['advertising_id'] as $advertising_id){
            $advertising = Advertising::where('id', $advertising_id)->first();
            if($advertising){
                array_push($advertisements, $advertising);
            }
        }
        return $advertisements;
    }

    public function deleteAdvertisement(Request $request){
        $data = $request->all();
        Advertising::where('id', $data['id'])->delete();

        return response()->json(['success' => 'Successfully deleted']);
    }

    public function addAdvertisement(Request $request){
        $files = $request->all();
        $file = $request->file();
//
//        $request->validate([
//            'title' => 'required',
//            'duration' => 'required',
//            'file' => 'required'
//        ]);
        if($file){
            $files['file']->store('public/videos');
            $filename = Carbon::now()->timestamp . '_' . $files['file']->getClientOriginalName();
            $files['file']->move(public_path().'/storage/videos', $filename);
        }

        Advertising::create([
            'user_id' => Auth::id(),
            'title' => $files['title'],
            'duration' => $files['duration'],
            'file' => &$filename,
        ]);

        return response()->json(['success' => 'successfully added']);
    }

    public function deletePerson(Request $request){
        $nums = $request->all();
        $docs = UploadDocs::where('user_id', Auth::id())->get();
        $current_doc = $docs[$nums['parent']];
        $current_person_names = json_decode($current_doc['person_name']);
//        $current_name = $current_person_names[$nums['child']];
        array_splice($current_person_names, $nums['child'], 1);
        DB::table('upload_docs')->where('id', $current_doc['id'])->update(['person_name'=>json_encode($current_person_names)]);
        return response()->json('success');
    }
    public function checkDocuments(){
        if(Auth::user()->document_verified == 2){
            return response()->json(['checkedDocument']);
        }
        elseif (Auth::user()->document_verified == 1){
            return response()->json(['waitToCheck']);
        }else{
            return response()->json(['noDocument']);
        }
    }

    public function checkDocumentsForHolders(){
        if(Auth::user()->document_verified == 2){
            return response()->json(['checkedDocument']);
        }
        elseif (Auth::user()->document_verified == 1){
            return response()->json(['waitToCheck']);
        }else{
            return response()->json(['noDocument']);
        }
    }

    public function checkHolder(){
            return response()->json('success', 200);
    }
    public function checkCinema(){
            return response()->json('success', 200);
    }
}
