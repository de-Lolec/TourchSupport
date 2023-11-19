<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormProblem extends Component
{
    use WithFileUploads;

    public $fio = '';
    public $email = '';
    public $phone = '';
    public $text = '';
    public $file = '';
    public $checkbox = 0;

    public function save() {
        $this->validate([
            'file' => 'nullable',
            'fio' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:12',
            'text' => 'required|max:255|min:10',
            'checkbox' => 'accepted'
        ],
        [
            'file.image' => 'Загружайте только изображение',
            'fio.required' => 'Обязательно для заполнения',
            'email.required' => 'Обязательно для заполнения',
            'email.email' => 'Почта должна быть валидной',
            'phone.required' => 'Обязательно для заполнения',
            'phone.min' => 'Минимум 11 символов',
            'phone.max' => 'Максимум 12 символов',
            'text.required' => 'Обязательно для заполнения',
            'text.max' => 'Максимум 255 символов',
            'text.min' => 'Минимум 10 символов',
            'checkbox.accepted' => 'Поставьте галочку',
        ]);


//здесь все данные которые пришли из валидации
//        Contact::create([
//            'path_file' => $this->file ? $this->file->store('photos') : 'no-photo-available.png',
//            'name' => $this->fio,
//            'email' => $this->email,
//            'phone' => $this->phone,
//            'text' => $this->text,
//        ]);

        return redirect()->to('/chat');
    }

    public function render()
    {
        return view('livewire.support.form-problem');
    }
}
