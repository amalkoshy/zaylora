<?php

namespace App\Livewire\Admin;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactMessages extends Component
{
    public $confirmingDelete = null;

    public function markRead($id)
    {
        ContactMessage::findOrFail($id)->update(['read_at' => now()]);
    }

    public function markUnread($id)
    {
        ContactMessage::findOrFail($id)->update(['read_at' => null]);
    }

    public function delete($id)
    {
        ContactMessage::findOrFail($id)->delete();
        $this->confirmingDelete = null;
    }

    public function render()
    {
        return view('livewire.admin.contact-messages', [
            'messages' => ContactMessage::latest()->get(),
            'unreadCount' => ContactMessage::whereNull('read_at')->count(),
        ]);
    }
}
