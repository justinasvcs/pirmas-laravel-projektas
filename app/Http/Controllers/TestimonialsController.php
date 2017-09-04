<?php

namespace App\Http\Controllers;

use App\Testimonial;

use Illuminate\Support\Facades\Auth;

class TestimonialsController extends Controller {

    public function getAll()
    {
        $title = 'Atsiliepimai';

        // Testimonial::create([
        //     'name' => 'kazkas kazkas',
        //     'time' => date('Y-m-d H:i:s'),
        //     'content' => 'lorem ipsum'
        // ]);

        $testimonials = Testimonial::get();
        // ND: pasirinkti tik vieną įrašą

        return view('testimonials', [
            'title' => $title,
            'testimonials' => $testimonials
        ]);
    }

    public function getSingle($id)
    {
        $testimonial = Testimonial::find($id);

        return view('single-testimonial', [
            'testimonial' => $testimonial
        ]);
    }

}