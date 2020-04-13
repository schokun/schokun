<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Illuminate\Filesystem\Filesystem;


class Image extends Model
{
    static function add($data , $table, $image_id = null)
    {
        Self::delOldImage($image_id);
        $image = new Self();
        $image->path = $data->store("images/${table}/" , 'public');
        $image->extension = $data->extension();
        $image->size = $data->getSize();
        $image->mime_type = $data->getClientMimeType();
        $image->save();

        return $image->id;
    }

    static function delOldImage($image_id)
    {
        $image = Self::find($image_id);
        $id = $image->id;
        if($id != 1 && $id!=2) {
            $exists = Storage::disk('public')->exists($image->path);
            if($exists){
              Storage::disk('public')->delete($image->path);
              Self::where('id' , $id)->delete();
            }
        }
    }
}
