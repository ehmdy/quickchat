<?php

namespace App\Livewire\Group;

use Livewire\Component;
use App\Models\Group;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class CreateGroup extends Component
{
    public string $name = '';
    public ?Group $group = null;

    protected function rules(): array
    {
        return [
            'name' => ['required', Rule::unique('groups', 'name')->ignore(optional($this->group)->id)],
        ];
    }

    public function save(): void
    {
        $this->validate();

        if (empty($this->group)) {
            $group = Group::create([
                'name' => $this->name,
                'link' => Uuid::uuid4()->toString(),
                'created_by' => auth()->id(),
            ]);

            // Add the creator to the group
            $group->users()->attach(auth()->id());

            session()
            ->flash('status',"Group created successfully. Share this link to invite others: " . url('/invite/' . $group->link));
        } else {
            $this->group->update([
                'name' => $this->name,
                'link' => Uuid::uuid4()->toString(),
                'created_by' => auth()->id(),
            ]);

            session()->flash('status', 'Group updated successfully.');
        }

        $this->reset('group', 'name');
    }

   

    public function render(): View
    {
        return view('livewire.group.create-group');
    }
}
