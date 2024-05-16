<?php include('partials-front/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/about-me.css">
<title>About Me</title>
</head>
<body>
<div class="container">
    <img src="images/portet.jpg" alt="Portret Photo" class="profile-img" onclick="openModal()">
    <h1>About Me</h1>
    <table>
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        <tr>
            <td>Name:</td>
            <td>Oarga Claudia</td>
        </tr>
        <tr>
            <td rowspan="2">Contact:</td>
            <td>Email: claudiaandreea24@yahoo.com</td>
        </tr>
        <tr>
            <td>Phone: +40742040645</td>
        </tr>
        <tr>
            <th colspan="2">Interests</th>
        </tr>
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <th style="background-color: palevioletred;">Category</th>
                        <th  style="background-color: palevioletred;">Description</th>
                    </tr>
                    <tr>
                        <td rowspan="4">Hobbies</td>
                        <td>Reading</td>
                    </tr>
                    <tr>
                        <td>Watching Turkish Series</td>
                    </tr>
                    <tr>
                        <td>Computer Science</td>
                    </tr>
                    <tr>
                        <td>Photography</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Details</td>
                        <td>Favorite Destination: Paris, France</td>
                    </tr>
                    <tr>
                        <td>Dream Destination: Maldives</td>
                    </tr>
                    <tr>
                        <td rowspan="2">Favorite Things</td>
                        <td>Favorite Book: The Little Prince</td>
                    </tr>
                    <tr>
                        <td>Favorite Animal: Dog</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
    <div class="button-container">
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for Programming Languages.."> <br>
  <!-- Buton de sortare -->
  <button class="sort-button" onclick="sortTable()">Sort Programming Languages in Alphabetical Order</button>
    </div>
    <table id="myTable">
  <tr class="header">
    <th style="width:60%;">Programming Languages</th>
    <th style="width:40%;">Proeficency Level</th>
  </tr>
  <tr>
    <td>Python</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>C++</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>JAVA</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>PHP</td>
    <td>Intermediate</td>
  </tr>
  <tr>
    <td>C#</td>
    <td>Intermediate</td>
  </tr>
  <tr>
    <td>React</td>
    <td>Intermediate</td>
  </tr>
  <tr>
    <td>JavaScript</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>SQL</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>HTML</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>CSS</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>Assembly Language</td>
    <td>Advanced</td>
  </tr>
  <tr>
    <td>C</td>
    <td>Beginner</td>
  </tr>
</table>
</div>

<div class="nested-list">
        <h2><u>More Details About Me</u></h2>
        <ul>
            <li style="color: #3498db; font-size: larger;"><b><u>Favorite Songs</b></u>
            <ul>
                <li><span style="color: #e74c3c; font-size: 1.5em;">&#8226;</span> <a href="https://www.youtube.com/watch?v=51u5fnyrGj4" style="color: #e74c3c;">D. Laurence - Arcade</a></li>
                <li><span style="color: #e74c3c; font-size: 1.5em;">&#8226;</span> <a href="https://www.youtube.com/watch?v=TyNE_eBhfpc&list=RDMMTyNE_eBhfpc&start_radio=1" style="color: #e74c3c;">Mikolas - Delilah</a></li>
                <li><span style="color: #e74c3c; font-size: 1.5em;">&#8226;</span> <a href="https://www.youtube.com/watch?v=HX5l5DxmmBw&list=RDMMTyNE_eBhfpc&index=2" style="color: #e74c3c;">M. Pokora - Tombé</a></li>
            </ul>
            </li>
        </ul>
    </div>

<!-- The Modal -->
<div id="myModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <img class="modal-content" id="modalImg">
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.querySelector(".profile-img");
    var modalImg = document.getElementById("modalImg");

    function openModal() {
        modal.style.display = "block";
        modalImg.src = img.src;
    }

    // When the user clicks on <span> (x), close the modal
    function closeModal() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    }
    function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value;
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
//am adaugat acuma
function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  while (switching) {
    switching = false;
    rows = table.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("td")[0];
      y = rows[i + 1].getElementsByTagName("td")[0];
      if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

</script>
</body>
</html>
<?php include('partials-front/footer.php');?>

