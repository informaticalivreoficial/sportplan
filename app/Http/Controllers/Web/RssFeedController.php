<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\ConfigService;

class RssFeedController extends Controller
{
    protected $configService;

    public function __construct(ConfigService $configService)
    {
        $this->configService = $configService;
    }

    public function feed()
    {
        $posts = Post::orderBy('created_at', 'DESC')->where('tipo', 'artigo')->postson()->limit(10)->get();
        $paginas = Post::orderBy('created_at', 'DESC')->where('tipo', 'pagina')->postson()->limit(10)->get();
        $noticias = Post::orderBy('created_at', 'DESC')->where('tipo', 'noticia')->postson()->limit(15)->get();
        
        return response()->view('web.'.$this->configService->getConfig()->template.'.feed', [
            'noticias' => $noticias,
            'posts' => $posts,
            'paginas' => $paginas
        ])->header('Content-Type', 'application/xml');
        
    }
}
