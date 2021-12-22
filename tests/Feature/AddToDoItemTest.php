<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Livewire\Livewire;
use App\Models\TodoItem;
use App\Http\Livewire\Todo\Form;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddToDoItemTest extends TestCase
{
    use RefreshDatabase, DatabaseMigrations;

    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testToDoItemAssignedToUser()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(Form::class)
            ->set('description', 'exampleToDo')
            ->call('createItem');

        $item = TodoItem::where('description', 'exampleToDo')->first();

        $this->assertEquals($item->user_id, $user->id);
    }

    public function testToDoItemDescriptionIsShorterThan6()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Livewire::test(Form::class)
            ->set('description', 'test')
            ->call('createItem')
            ->assertHasErrors(['description']);
    }
}
