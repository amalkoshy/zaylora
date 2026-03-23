<div>
    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Contact Messages</h2>
            <p class="text-sm text-gray-500 mt-0.5">
                {{ $messages->count() }} total
                @if($unreadCount > 0)
                    &bull; <span class="text-[#1e5c2e] font-medium">{{ $unreadCount }} unread</span>
                @endif
            </p>
        </div>
    </div>

    @if($messages->isEmpty())
        <div class="bg-white rounded-xl border border-dashed border-gray-300 py-16 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <p class="text-gray-400 text-sm">No messages yet.</p>
        </div>
    @else
        <div class="space-y-3">
            @foreach($messages as $msg)
                <div class="bg-white rounded-xl border {{ $msg->isRead() ? 'border-gray-200' : 'border-[#3a7d44]/40 shadow-sm' }} overflow-hidden">
                    {{-- Message header --}}
                    <div class="flex items-start justify-between gap-4 px-5 py-4">
                        <div class="flex items-start gap-3 min-w-0">
                            {{-- Unread dot --}}
                            <div class="mt-1.5 shrink-0">
                                @if(!$msg->isRead())
                                    <span class="w-2 h-2 rounded-full bg-[#3a7d44] block"></span>
                                @else
                                    <span class="w-2 h-2 rounded-full bg-gray-200 block"></span>
                                @endif
                            </div>
                            <div class="min-w-0">
                                <div class="flex items-center gap-2 flex-wrap">
                                    <span class="font-semibold text-gray-800 text-sm">{{ $msg->name }}</span>
                                    @if(!$msg->isRead())
                                        <span class="text-[10px] bg-green-100 text-green-700 px-2 py-0.5 rounded-full font-medium uppercase tracking-wider">New</span>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 mt-0.5 flex-wrap">
                                    <a href="mailto:{{ $msg->email }}" class="text-xs text-gray-500 hover:text-[#1e5c2e] transition-colors">{{ $msg->email }}</a>
                                    @if($msg->phone)
                                        <span class="text-gray-300">·</span>
                                        <a href="tel:{{ $msg->phone }}" class="text-xs text-gray-500 hover:text-[#1e5c2e] transition-colors">{{ $msg->phone }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <span class="text-xs text-gray-400 shrink-0 mt-0.5">{{ $msg->created_at->format('d M Y, h:i A') }}</span>
                    </div>

                    {{-- Message body --}}
                    <div class="px-5 pb-4 border-t border-gray-100">
                        <p class="text-sm text-gray-600 mt-3 leading-relaxed whitespace-pre-line">{{ $msg->message }}</p>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-3 px-5 py-3 bg-gray-50 border-t border-gray-100">
                        @if(!$msg->isRead())
                            <button wire:click="markRead({{ $msg->id }})"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-[#1e5c2e] hover:text-[#174a25] transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                                Mark as read
                            </button>
                        @else
                            <button wire:click="markUnread({{ $msg->id }})"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-400 hover:text-gray-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"/>
                                </svg>
                                Mark as unread
                            </button>
                        @endif

                        <span class="text-gray-200">|</span>

                        <a href="mailto:{{ $msg->email }}"
                           class="inline-flex items-center gap-1.5 text-xs font-medium text-gray-500 hover:text-gray-800 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            Reply by email
                        </a>

                        <span class="text-gray-200">|</span>

                        @if($confirmingDelete === $msg->id)
                            <span class="text-xs text-gray-500">Delete?</span>
                            <button wire:click="delete({{ $msg->id }})"
                                    class="text-xs font-medium text-red-600 hover:text-red-700 transition-colors">Yes</button>
                            <button wire:click="$set('confirmingDelete', null)"
                                    class="text-xs font-medium text-gray-400 hover:text-gray-600 transition-colors">No</button>
                        @else
                            <button wire:click="$set('confirmingDelete', {{ $msg->id }})"
                                    class="inline-flex items-center gap-1.5 text-xs font-medium text-red-400 hover:text-red-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
