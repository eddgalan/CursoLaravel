<?php

use Livewire\Component;
use Illuminate\Database\Eloquent\Model;

new class extends Component
{
    /**
     * @var Model $commentable
     */
    public Model $commentable;

    /**
     * @var bool $showForm
     */
    public bool $showForm = false;

    /**
     * @return array
     */
    public function with(): array
    {
        return [
            'comments' => $this->commentable->comments,
        ];
    }

    /**
     * @return void
     */
    public function toggle(): void
    {
        $this->showForm = !$this->showForm;
    }
};
?>

<div>
    <ul class="my-4 space-y-2">
        @foreach ($comments as $comment)
            <li class="flex items-center gap-2">
                <p class="text-xs bg-white/10 p-4 rounded-md">
                    <span class="text-gray-300">
                        {{ $comment->content }}
                    </span><br>
                    <span class="text-gray-500">
                        {{ $comment->user->name }} |
                        {{ $comment->created_at->diffForHumans() }}
                    </span>
                </p>

                <div>&hearts;</div>
            </li>
        @endforeach
    </ul>
    @if (!$showForm)
        <p class="text-gray-500">
            <a wire:click="toggle"
               class="rounded-md text-xs hover:underline cursor-pointer">
                Agregar comentario
            </a>
        </p>
    @else
        Formulario de comentario:
    @endif
</div>
