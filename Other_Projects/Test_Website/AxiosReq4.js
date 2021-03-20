
// GET REQUEST
$(function () {
    $.ajax({
        type: 'GET',
        url: 'https://jsonplaceholder.typicode.com/',
        success: function(data) {
            console.log('success', data);
        }
    });
});

// Show output in browser
//function showOutput(res) {
//
//    //This code will be checking the length of the data, if no data, show text
//    console.log(res.data);
//
//
//    //This for loop checks the results and repeats once finished
//    for (var i = 0; i < res.data.length; i++) {
//
//        if (res.data.length === 0) {
//            $('<div>').text('No data available').appendTo('#res');
//        }
//
//        //this adds a card to the div
//        var results = $('<div>').addClass('card p-4 my-4');
//
//        //this adds the name as a heading tag thats appended to inside the div
//        // and card thats above
//        var h3 = $('<h3>').text(res.data[i].userId).appendTo(results);
//
//        //this jquery selector selects all the paragraph that is in this
//        //for loop function and will print out the review. This will then be
//        //placed in the div thats named checkinEL
//        $('<p>').text(res.data[i].title).appendTo(results);
//
//        //this jquery will stick the whole checkin data inside of the res id
//        //div that i made
//        $('#res').append(results);
//    }
//}
//
//// Event listeners
//document.getElementById('get').addEventListener('click', getTodos);


