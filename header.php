
    <style>
        html {
            margin: 3rem;
            font-family: Arial, Helvetica, sans-serif;
            color: whitesmoke;
            background-color: #006400;
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

        table, th, td {
            margin-left: auto;
            margin-right: auto;
            border: 1px solid grey;
            border-collapse: collapse;
        }

        table {
            width: 87%;
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
        // Function to identify returning user or to register new user
        function getUser() {
            const user = document.getElementById("user").value;
            console.log(user);

            if (user.length == 0) {
                document.getElementById("useremail").innerHTML = "";
            } else {
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let result = JSON.parse(this.responseText);
                        document.getElementById("welcome").innerHTML = result[0] + " ";
                        document.getElementById("useremail").innerHTML = result[1];
                        document.getElementById("userout").style.display = "block";
                        document.getElementById("newnoteform").style.display = "block";
                        document.getElementById("login").style.display = "none";

                        // Set the user ID in local storage
                        localStorage.setItem('uid', result[2]);

                        fetchNotes(result[2]);
                    }
                };
                xmlhttp.open("GET", "getuser.php?q=" + user, true);
                xmlhttp.send();
            }
         };

        // Function to fetch old notes of the user from the db
        function fetchNotes(data) {

            if (data.length == 0) {
                document.getElementById("yn").innerHTML = "";
            } else {
                document.getElementById("yn").firstChild.innerHTML = "Your Christmas wish list:";
                let xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let result = JSON.parse(this.responseText);

                        if (result !== null) {
                        result.forEach(displayNote);
                        document.getElementById("yn").style.display = "block";
                        document.getElementById("notes").style.display = "block";
                        }
                    }
                };
                xmlhttp.open("GET", "fetchnotes.php?q=" + data, true);
                xmlhttp.send();
            }
        };

        // Function to add notes, retrived from the db to the 'notes' div
        function displayNote(item) {
            // Create new paragraph element for the note
            let p = document.createElement('p');
                // Add note text to just created paragraph^^
                p.innerHTML = item.NoteText;
                // Apply css style to the note
                p.classList.add('note');

            // Append 'notes' div with newly created note
            document.getElementById("notes").append(p);
        };

        function recordNewNote(note, uid) {
            
            const data = [note, uid];
            // console.log(data);
            let jdata = JSON.stringify(data);
            // console.log(jdata);

            let xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let result = this.responseText;
                    console.log(result);
                }
            };
            xmlhttp.open("GET", "recordnewnote.php?q=" + jdata, true);
            xmlhttp.send();
        };

        // Wait for page to load
        document.addEventListener('DOMContentLoaded', function() {
            // Add new notes
            // Select the submit button for new notes and input to be used later
            const submit = document.querySelector('#submit');
            const newNote = document.querySelector('#newnotetxt');

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

            // Listen for submission of form newnote
            document.querySelector('form').onsubmit = () => {

                // Find the note text the user just submitted
                let note = newNote.value;
                let uid = localStorage.getItem('uid');
                console.log(uid);

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
                document.getElementById("yn").style.display = "block";
                document.getElementById("notes").style.display = "block";

                recordNewNote(note, uid);

                // Clear out input field:
                newNote.value = '';

                // Disable the submit button again:
                submit.disabled = true;

                // Stop form from submitting
                return false;
            }
        });
    </script>

