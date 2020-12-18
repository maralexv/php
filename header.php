<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Notes</title>
    <style>
        html {
            margin: 3rem;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 120%;
        }

        div {
            overflow: auto;
            padding: 1em;
            margin:  5px;
            display:  block;
            width:  100%;
        }

        p {
            text-align: justify;
            width: 90%;
        }
        input {
            margin-right: 8px;
        }

        textarea {
            margin-right: 8px;
        }


        footer {
            position: fixed;
            left: 0;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }

        .note {
            margin-top: 5px;
            margin-bottom: 5px;
            padding: 1rem;
            border-bottom: 1px lightgrey solid;
        }
    </style>

    <script>
        // Wait for page to load
        document.addEventListener('DOMContentLoaded', function() {

            // Select the submit button and input to be used later
            const submit = document.querySelector('#submit');
            const newNote = document.querySelector('#newnote');

            // Disable submit button by default:
            submit.disabled = true;

            // Listen for input to be typed into the input field
            newNote.onkeyup = () => {
                if (newNote.value.length > 0) {
                    submit.disabled = false;
                }
                else {
                    submit.disabled = true;
                }
            }

            // Listen for submission of form
            document.querySelector('form').onsubmit = () => {

                // Find the note text the user just submitted
                let note = newNote.value;

                // Create new html node for the new note and add the note text to it
                let p = document.createElement('p');
                p.innerHTML = note;
                p.classList.add('note');

                // Insert new element to the top of notes list:
                // Get the parent element
                let parent = document.querySelector('#notes');
                // Get the parent's first child
                let topChild = parent.firstChild;
                // Insert the new element before the first child
                parent.insertBefore(p, topChild);

                // Clear out input field:
                newNote.value = '';

                // Disable the submit button again:
                submit.disabled = true;

                // Stop form from submitting
                return false;
            }
        });
    </script>
</head>

<body>
