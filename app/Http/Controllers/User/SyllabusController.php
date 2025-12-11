<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Transformers\Platform\SubCategoryCardTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SyllabusController extends Controller
{
    public function changeSyllabus()
    {
        // Data fetch wahi rahega, bas return type change hoga
        $categories = SubCategory::active()->has('sections')
            ->with(['sections:id,name,code,slug', 'subCategoryType:id,name', 'category:id,name'])
            ->orderBy('name')
            ->get();

        // Hum fractal() use karke array pass kar rahe hain
        return view('user.change_syllabus', [
            'categories' => fractal($categories, new SubCategoryCardTransformer())->toArray()['data']
        ]);
    }

    public function updateSyllabus(Request $request)
    {
        $category = SubCategory::where('code', $request->category)->firstOrFail();

        // Cookies set karna (Pure PHP Style)
        Cookie::queue('category_id', $category->id, 60*24*7);
        Cookie::queue('category_name', $category->name, 60*24*7);

        return redirect()->route('user_dashboard')
            ->with('success', 'Syllabus updated to ' . $category->name);
    }
}
