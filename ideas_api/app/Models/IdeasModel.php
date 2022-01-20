<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdeasModel extends Model
{
    use HasFactory;    
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
   protected $fillable = [
       'completed',
       'title',
       'description',
   ];

   // treats completed as boolean not numbers
   // Old response 
    //    {
    //     "id": 1,
    //     "created_at": "2022-01-20T18:59:02.000000Z",
    //     "updated_at": "2022-01-20T18:59:02.000000Z",
    //     "completed": 0,
    //     "title": "test Title",
    //     "description": "Test Description"
    // }

    // New Response 

    // {
    //     "id": 1,
    //     "created_at": "2022-01-20T18:59:02.000000Z",
    //     "updated_at": "2022-01-20T18:59:02.000000Z",
    //     "completed": false,
    //     "title": "test Title",
    //     "description": "Test Description"
    // }

   protected $casts = [ 'completed' => 'boolean' ];
}
