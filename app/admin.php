<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class admin extends Model{
    protected $table='mb_users';
    public $timestamps=false;
    protected $primaryKey='id';
}
