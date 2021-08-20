<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
USE \Exception;
class Person extends Model
{
    protected $table = "persons";

    protected $fillable = [
        'firstname',
        'lastname',
        'created_at',
        'updated_at',
    ];
    private $id;

    public static function find($id)
    {
        $person =DB::table('persons')->where('id',$id)->first();
        return $person;
    }

    public static function create(array $request)
    {
        $userClient= new Person();
        $userClient->firstname=$request['firstname'];
        $userClient->lastname=$request['lastname'];
        $userClient->save();
        return true;

    }
    public static function getAll()
    {
        return DB::table('persons')->get();
    }

    public function deleteUser($id)
    {
        if (DB::table('persons')->where('id', $id)->exists()) {
            $userClient = Person::find($id);
//            $userClient->delete();
            DB::delete('delete from persons where id = ?',[$id]);
            return true;
        }else{
            return false;
        }
    }
}

