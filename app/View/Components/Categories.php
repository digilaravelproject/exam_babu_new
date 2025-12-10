<?php

namespace App\View\Components;

use App\Models\Category;
use App\Settings\CategorySettings;
use Illuminate\View\Component;

class Categories extends Component
{
    /**
     * @var CategorySettings
     */
    private CategorySettings $categorySettings;

    /**
     * Create a new component instance.
     * @param CategorySettings $categorySettings
     */
    public function __construct(CategorySettings $categorySettings)
    {
        $this->categorySettings = $categorySettings;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        // Load only parent categories (unique), but eager-load active subcategories
        $categories = Category::with(['subCategories' => function ($query) {
                $query->where('is_active', true);
            }])
            ->where('is_active', true)
            ->orderBy('name', 'asc')
            ->limit($this->categorySettings->limit)
            ->get();

        return view('components.categories', [
            'category'   => $this->categorySettings->toArray(),
            'categories' => $categories,
        ]);
    }
}
