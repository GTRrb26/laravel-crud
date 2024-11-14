<div>

    <div style="text-align: center; margin-top: 20px;">
    <h1>Search Users by Name</h1>

    <!-- Input field to search users -->
    <input type="text" wire:model="searchName" placeholder="Enter student name" />
    <!-- wire:keydown="updatedSearchName" -->

    <h2>Matching Users:</h2>
    
    <!-- Display users found in the database -->
    <ul>
        @forelse ($students as $student)
            <li>{{ $student->first_name }}</li>
        @empty
            <li>No users found</li>
        @endforelse
    </ul>
</div>
<script>
    Livewire.on('searchNameUpdated', function(searchName) {
        console.log('Updated searchName:', searchName);
    });
</script>
</div>

</div>
