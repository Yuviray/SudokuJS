function myFunction() {
    document.getElementById("demo").innerHTML="Paragraph changed.";
}


function changeImage() {
  var image = document.getElementById('myImage');
  if (image.src.match("https://www.w3schools.com/js/pic_bulboff.gif")) {
    image.src = "https://www.w3schools.com/js/pic_bulbon.gif";
  } else {
    image.src = "https://www.w3schools.com/js/pic_bulboff.gif";
  }
}

//setup our table array
var tableArr = [
    ["1", "2"],
    ["3", "4"]
  ]
  //create a Table Object
  let table = document.createElement('table');
  //iterate over every array(row) within tableArr
  for (let row of tableArr) {
    table.insertRow();
    for (let cell of row) {
      let newCell = table.rows[table.rows.length - 1].insertCell();
      newCell.textContent = cell;
    }
  }
  //append the compiled table to the DOM
  document.body.appendChild(table);
