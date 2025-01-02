<?php

namespace App\Livewire\Birthday;

use App\Models\Wish;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithFileUploads;

    public $showWishes = false;
    public $name;
    public $message;
    public $photo;
    public $playMusic = false;
    public $displayWishes = true;
    public $isCameraActive = false;

    protected $rules = [
        'name' => 'required|min:3',
        'message' => 'required|min:10',
        'photo' => 'nullable',
    ];

    protected $messages = [
        'name.required' => 'Nama tidak boleh kosong.',
        'name.min' => 'Nama minimal 3 karakter.',
        'message.required' => 'Ucapan tidak boleh kosong.',
        'message.min' => 'Ucapan minimal 10 karakter.',
    ];

    protected $listeners = [
        'photoTaken',
        'deleteWish',
        'refreshWishes' => '$refresh'
    ];

    public function photoTaken($photoData)
    {
        try {
            $this->photo = $photoData;
            $this->isCameraActive = false;
        } catch (\Exception $e) {
            session()->flash('error', 'Gagal mengambil foto. Silakan coba lagi.');
        }
    }


    public function toggleCamera()
    {
        $this->isCameraActive = !$this->isCameraActive;
    }

    public function addWish()
    {
            $this->validate();

            $filePath = null;

            if ($this->photo) {
                // Handle both base64 and uploaded file
                if (is_string($this->photo) && strpos($this->photo, 'data:image') === 0) {
                    // Handle base64 image from camera
                    $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $this->photo));
                    $filename = 'wishes/' . Str::random(40) . '.jpg';
                    Storage::disk('public')->put($filename, $image);
                    $filePath = 'storage/' . $filename;
                } else {
                    // Handle uploaded file
                    $filename = 'wishes/' . Str::random(40) . '.' . $this->photo->getClientOriginalExtension();
                    $filePath = $this->photo->storeAs('public', $filename);
                    $filePath = Storage::url($filePath);
                }
            }

            Wish::create([
                'name' => $this->name,
                'message' => $this->message,
                'photo_path' => $filePath,
            ]);

            $this->reset(['name', 'message', 'photo']);
            $this->showWishes = true;
            session()->flash('message', 'Ucapan berhasil ditambahkan!');
            // $this->emit('wishAdded');
            return redirect('list-wish');


    }
    // public function addWish()
    // {
    //     $this->validate();

    //     $photoPath = null;
    //     if ($this->photo) {
    //         $photoPath = $this->photo->store('wishes', 'public');
    //     }

    //     Wish::create([
    //         'name' => $this->name,
    //         'message' => $this->message,
    //         'photo_path' => $photoPath,
    //     ]);

    //     $this->reset(['name', 'message', 'photo']);
    //     session()->flash('message', 'Ucapan berhasil ditambahkan!');
    // }

    // public function test()
    // {
    //     if($this->showWishes == true)
    //     {
    //         return redirect('wish.index');
    //     }
    // }







    public function render()
    {
        return view('livewire.birthday.index', [
            'wishes' => Wish::latest()->paginate(16),
        ])->layout('components.layouts.app');
    }
}
