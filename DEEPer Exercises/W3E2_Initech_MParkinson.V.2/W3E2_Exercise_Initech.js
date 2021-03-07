// GET REQUEST
function getTodos() {

  axios
    .get('http://localhost:8080/checkins', {
      timeout: 5000
    })
    .then(res => showOutput(res))
    .catch(err => console.error(err));
}

window.addEventListener('load', ()=>{ 
        
       const form = document.querySelector('form'); 
       form.addEventListener('submit', (e)=>{ 
           //to prevent reload 
           e.preventDefault(); 
           //creates a multipart/form-data object 
           let data = new FormData(form); 
           axios({ 
             method  : 'post', 
             url : '/', 
             data : data, 
           }) 
           .then((res)=>{ 
             console.log(res); 
           }) 
           .catch((err) => {throw err}); 
       }); 
   }); 

// Show output in browser
//function showOutput(res) {
  /*document.getElementById('res').innerHTML = `

  <div class="card mt-3">
    <div class="card-header">
      Data
    </div>
    <div class="card-body">
      <pre>${JSON.stringify(res.data, null, 2)}</pre>
    </div>
  </div>

`;*/

    //This code will be checking the length of the data, if no data, show text
//    console.log(res.data);
    if (res.data.length === 0) {
        $('<div>').text('No checkins available').appendTo('#res');
    }

    //This for loop checks the results and repeats once finished
    for (var i = 0; i < res.data.length; i++) {

        //this adds a card to the div
        var checkinEl = $('<div>').addClass('card p-4 my-4');

        //this adds the name as a heading tag thats appended to inside the div
        // and card thats above
        var h3 = $('<h3>').text(res.data[i].name).appendTo(checkinEl);

        //this is adding the star rating to the div
        var starRating = $('<div>').addClass('star-rating');

        //this is getting the rating out of the data .json file and
        //multiplying by 20 as it works better when converted into percentage
        var checkinRating = res.data[i].rating * 20;

        //this is a jquery selector.. so will be selecting the divs.css
        //as to change the width dependent on the checkinRating and
        //then put this next to the star rating
        $('<div>').css('width', checkinRating + '%').appendTo(starRating);

        //this will put the star rating next to the name of the client
        starRating.appendTo(h3);

        //this jquery selector selects all the paragraph that is in this
        //for loop function and will print out the review. This will then be
        //placed in the div thats named checkinEL
        $('<p>').text(res.data[i].review).appendTo(checkinEl);

        //this jquery will stick the whole checkin data inside of the res id
        //div that i made
        $('#res').append(checkinEl);
    }


// Event listeners
document.getElementById('get').addEventListener('click', getTodos);



//Check-in Class 

class CheckIn {
    constructor(name, rating, review, timestamp) {
    this.name = name;
    this.rating = rating;
    this.review = review;
    this.timestamp = timestamp;
    
}
}

function expandTextarea(id) {
    document.getElementById(id).addEventListener('keyup', function() {
        this.style.overflow = 'hidden';
        this.style.height = 0;
        this.style.height = this.scrollHeight + 'px';
    }, false);
}

expandTextarea('txtarea');
