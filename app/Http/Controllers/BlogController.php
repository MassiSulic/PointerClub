<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Muestra el contenido de un blog específico.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function showBlog($slug)
    {
        $path = storage_path("blogs/{$slug}.html"); // Cambiar extensión a .html
    
        // Verifica si el archivo existe
        if (file_exists($path)) {
            $htmlContent = file_get_contents($path); // Leer el archivo HTML directamente
        
            // Devuelve el contenido como respuesta JSON
            return response()->json(['content' => $htmlContent]);
        }
    
        // Si no existe el archivo, devuelve un error 404
        return abort(404);
    }

    /**
     * Muestra la lista de blogs en la vista Actualidad.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Simulando algunos blogs con datos estáticos
        $blogs = $this->getBlogs();

        // Devuelve la vista Actualidad con los blogs
        return view('Actualidad', compact('blogs'));
    }

    /**
     * Muestra la vista de inicio con los blogs y el contenido adicional.
     *
     * @return \Illuminate\Http\Response
     */
    public function listForHome()
    {
        // Simulando algunos blogs con datos estáticos
        $blogs = $this->getBlogs();

        // Devuelve la vista Inicio con los blogs y otras secciones
        return view('Inicio', compact('blogs'));
    }

    /**
     * Obtiene la lista de blogs (puede conectarse a una base de datos en el futuro).
     *
     * @return array
     */
    private function getBlogs()
    {
        return [
            (object)[
                'title' => 'ASAMBLEA GENERAL',
                'excerpt' => 'Convocatoria el 14 de junio en Zaragoza. Consulta el orden del día.',
                'slug' => 'asamblea-general',
                'image' => asset('Blog/Concurso-promo-12-13-abril.jpg')
            ],
            (object)[
                'title' => 'Normas 2025',
                'excerpt' => 'Campeonato Europeo Pointer de Gran Busca y de Búsqueda de Caza',
                'slug' => 'normas',
                'image' => asset('Blog/IMG_0385.jpg')
            ],
            (object)[
                'title' => 'CAMPEONATOS DE EUROPA POINTER GB/BC',
                'excerpt' => 'Descarga los programas completos',
                'slug' => 'campeonatos',
                'image' => asset('Blog/IMG_0404.jpg')
            ],
            (object)[
                'title' => 'SEMANA DE ANDALUCIA  2025',
                'excerpt' => '¡No te pierdas nada de información!',
                'slug' => 'semana',
                'image' => asset('Blog/SemanaProgramaGrande.jpeg')
            ],
            (object)[
                'title' => 'ALOJAMIENTOS PARA LA SEMANA DE ANDALUCÍA',
                'excerpt' => 'Recuerda reservar con tiempo tu alojamiento.',
                'slug' => 'alojamiento',
                'image' => asset('Blog/AlojamientoPerro.jpg')
            ],
            (object)[
                'title' => '¡Nueva Web del Pointer Club Español!',
                'excerpt' => 'Un espacio renovado para socios y amantes del Pointer Inglés',
                'slug' => 'nuevaWeb',
                'image' => asset('Blog/NuevaCompu.png')
            ],
        ];
    }
}
