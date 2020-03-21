<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class thuser extends Model{
    protected $table='th_user';
    protected $primaryKey='id';
    public $timestamps=false;
}
