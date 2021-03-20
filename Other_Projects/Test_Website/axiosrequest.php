<script>

// GET REQUEST
function getTodos() {

    axios
        .get('https://jsonplaceholder.typicode.com/todos/1', {
            timeout: 5000
        })
        .then(res => showOutput(res))
        .catch(err => console.error(err));
}


// Show output in browser
function showOutput(res) {

    //This code will be checking the length of the data, if no data, show text
    // console.log(res.data);


    //This for loop checks the results and repeats once finished
    for (var i = 0; i < res.data.length; i++) {

        if (res.data.length === 0) {
            $('<div>').text('No API available').appendTo('#res');
        }

        //this adds a card to the div
        var apiReq = $('<div>').addClass('card p-4 my-4');

        //this adds the name as a heading tag thats appended to inside the div
        // and card thats above
        var h3 = $('<h3>').text(res.data[i].name).appendTo(apiReq);

        //this jquery selector selects all the paragraph that is in this
        //for loop function and will print out the review. This will then be
        //placed in the div thats named apiReq
        $('<p>').text(res.data[i].review).appendTo(apiReq);

        //this jquery will stick the whole checkin data inside of the res id
        //div that i made
        $('#res').append(apiReq);
    }
}


// Event listeners
document.getElementById('get').addEventListener('click', getTodos);


function expandTextarea(id) {
    document.getElementById(id).addEventListener('keyup', function() {
        this.style.overflow = 'hidden';
        this.style.height = 0;
        this.style.height = this.scrollHeight + 'px';
    }, false);
}

expandTextarea('txtarea');

</script>