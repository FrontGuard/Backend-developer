document.addEventListener('DOMContentLoaded', function() {
    const notesList = document.getElementById('notesList');

    // Listen for clicks on update buttons
    notesList.addEventListener('click', function(event) {
        if (event.target.classList.contains('updateButton')) {
            const noteElement = event.target.closest('.note');
            const noteTitle = noteElement.querySelector('.noteTitle');
            const noteContent = noteElement.querySelector('.noteContent');

            // Enable editing
            noteTitle.contentEditable = true;
            noteContent.contentEditable = true;

            // Change button text
            event.target.textContent = 'Save';

            // Change button class
            event.target.classList.remove('updateButton');
            event.target.classList.add('saveButton');
        } else if (event.target.classList.contains('saveButton')) {
            const noteElement = event.target.closest('.note');
            const noteId = noteElement.dataset.id;
            const updatedTitle = noteElement.querySelector('.noteTitle').textContent;
            const updatedContent = noteElement.querySelector('.noteContent').textContent;

            // Send updated data to the server
            fetch('update_note.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: noteId, title: updatedTitle, content: updatedContent })
            })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    // Optionally, update the UI to reflect changes
                })
                .catch(error => console.error('Error updating note:', error));

            // Disable editing
            noteElement.querySelector('.noteTitle').contentEditable = false;
            noteElement.querySelector('.noteContent').contentEditable = false;

            // Change button text
            event.target.textContent = 'Update';

            // Change button class
            event.target.classList.remove('saveButton');
            event.target.classList.add('updateButton');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const noteForm = document.getElementById('noteForm');
    const notesList = document.getElementById('notesList');
    const noteTitleInput = document.getElementById('noteTitle');
    const noteContentInput = document.getElementById('noteContent');

    // Function to update a note
    function updateNote(noteElement) {
        const noteId = noteElement.dataset.id;
        const updatedTitle = noteElement.querySelector('.noteTitle').textContent;
        const updatedContent = noteElement.querySelector('.noteContent').textContent;

        // Send updated data to the server
        fetch('update_note.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: noteId, title: updatedTitle, content: updatedContent })
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // Optionally, update the UI to reflect changes
            })
            .catch(error => console.error('Error updating note:', error));
    }

    // Listen for clicks on update buttons
    notesList.addEventListener('click', function(event) {
        if (event.target.classList.contains('updateButton')) {
            const noteElement = event.target.closest('.note');
            updateNote(noteElement);
        }
    });

    // Listen for clicks on delete buttons
    notesList.addEventListener('click', function(event) {
        if (event.target.classList.contains('deleteButton')) {
            const noteElement = event.target.closest('.note');
            const noteId = noteElement.dataset.id;

            // Send a request to delete the note
            fetch('delete_note.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: noteId })
            })
                .then(response => response.text())
                .then(data => {
                    console.log(data);
                    // Optionally, update the UI to reflect changes (remove the note from the list)
                    noteElement.remove();
                })
                .catch(error => console.error('Error deleting note:', error));
        }
    });

    // Form submission handling
    noteForm.addEventListener('submit', function(event) {
        event.preventDefault();

        // Client-side validation
        if (noteTitleInput.value.trim() === '' || noteContentInput.value.trim() === '') {
            alert('Please fill out both title and content fields.');
            return; // Prevent form submission if validation fails
        }

        const formData = new FormData(this);

        fetch('add_note.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                this.reset();
                // Update notes list through AJAX request
                fetch('get_notes.php')
                    .then(response => response.text())
                    .then(data => {
                        notesList.innerHTML = data;
                    })
                    .catch(error => console.error('Error fetching notes:', error));
            })
            .catch(error => console.error('Error adding note:', error));
    });
});
