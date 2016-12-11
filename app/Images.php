<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Images extends Model
{
    /**
     * @var string
     */
    protected $table = 'Images';

    protected $fillable = ['subject_id', 'type', 'name'];

    public function user(){
        return $this->hasOne('App\User', 'id', 'subject_id');
    }

    public function product(){
        return $this->hasOne('App\Product', 'id', 'subject_id');
    }

    public static function upload(Request $request){

        $imageName = str_replace(" ", "_",
            $request->get('name') . '.' . $request->file('image')->getClientOriginalExtension());

        $path = base_path() . "/public/images/" . $request->get('type') . "/" . $request->get('id');

        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }

        $request->file('image')->move(
            $path, $imageName
        );

        chmod($path . '/' .  $imageName, 0777);

        self::create(array(
            'subject_id' => $request->get('id'),
            'type' => $request->get('type'),
            'name' => $imageName
        ));

        return 0;
    }
}
