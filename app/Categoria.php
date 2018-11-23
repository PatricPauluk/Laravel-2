<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

// Um produto pertence a uma categoria, e uma categoria tem vários produtos

class Categoria extends Model
{
    // Uma categoria tem vários produtos
    public function produtos(){
        return $this->hasMany('estoque\Produto');
    }
}
