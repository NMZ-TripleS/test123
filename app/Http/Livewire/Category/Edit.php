<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{   public Category $category;
    public $creatOrUpdate;
    protected $rules = [
        'category.name' => 'required|string|min:6',
    ];
    public function render()
    {
        return view('livewire.category.edit');
    }
    public function store()
    {
        $this->validate();

        if($this->category->save()){
            session()->flash('flash.banner', 'Category creation success!');
            session()->flash('flash.bannerStyle', 'success');
        }else{
            session()->flash('flash.banner', 'Category creation fail!');
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->to('categories');
    }
}
