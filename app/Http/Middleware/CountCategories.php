<?php

namespace App\Http\Middleware;

use App\Category;
use Closure;

class CountCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Category::all()->count() === 0){
            session()->flash('warning','At least one category should be created before creating any post!');
            return redirect(route('categories.create'));
        }
        return $next($request);
    }
}
