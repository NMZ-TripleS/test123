<?php

namespace App\Http\Livewire\Book;

use App\Models\Book;
use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    //['title','sub_title','image_urls','pdf_urls',
    //'video_urls','mp3_urls','description','category_id'];
    public Book $book;
    public $creatOrUpdate;
    public $catIds = array();
    public $categories;
    public $videos;
    public $pdfs;
    public $mp3;
    protected $rules = [
        'book.title' => 'required|string|min:6',
        'book.sub_title'=>'required|string|min:6',
        'book.image_urls'=>'nullable',
        'book.pdf_urls'=>'nullable',
        'book.video_urls'=>'nullable',
        'book.mp3_urls'=>'nullable',
        'book.description'=>'nullable',
        'catIds'=>'required'
    ];
    public function render()
    {
        $this->videos = explode(",",$this->book->video_urls);
        $this->pdfs = explode(",",$this->book->pdf_urls);
        $this->mp3s = explode(",",$this->book->mp3_urls);
        $this->images = explode(",",$this->book->image_urls);
        foreach ($this->book->categories as $category) {
            array_push($this->catIds,$category->pivot->category_id);
        }
        return view('livewire.book.edit');
    }
    public function mount()
    {
        
        $this->categories = Category::all();
        
    }
    public function store()
    {
        $this->validate();
        if($this->book->save()){
            session()->flash('flash.banner', 'Book creation success!');
            session()->flash('flash.bannerStyle', 'success');
        }else{
            session()->flash('flash.banner', 'Book creation fail!');
            session()->flash('flash.bannerStyle', 'danger');
        }
        $this->book->categories()->saveMany(Category::whereIn('id',$this->catIds)->get());
        return redirect()->to('books');
    }
}
