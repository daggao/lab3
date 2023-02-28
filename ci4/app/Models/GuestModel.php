<?php

namespace App\Models;

use CodeIgniter\Model;

class GuestModel extends Model
{

    protected $table = 'bsdaggao_MyGuests';
    
    protected $allowedFields = ['title','slug', 'email', 'website', 'comment', 'gender'];
    public function getGuest($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
        
}

