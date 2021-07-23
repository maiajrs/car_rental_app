<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'imagem'];

    public function rules() {
        return [
            'nome' => 'required|unique:marcas,nome,'.$this->id.'',
            'imagem' => 'required'
        ];
    }

    public function feedback() {
            return [
                'required' => 'O campo :attribute precisa ser preenchido',
                'nome.unique' => 'O nome da marca já existe'
            ];
    }
}
