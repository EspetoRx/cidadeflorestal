<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    //
    protected $appends = ['conteudo_titulo_resumido', 'conteudo_resumido'];
    public function getConteudoTituloResumidoAttribute()
    {
        return str_limit(strip_tags($this->getAttribute('titulo')), 80);
    }
    public function getConteudoResumidoAttribute()
    {
        return str_limit($this->getAttribute('texto_noticia'), 200, '...');
    }
    
}
