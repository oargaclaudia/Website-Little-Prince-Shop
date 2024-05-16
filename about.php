<?php include('partials-front/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>The Little Prince</title>
  <link rel="stylesheet" href="about.css">
</head>
<body>
  <header>
    <h1>The Little Prince</h1>
  </header>
  <main>
    <section id="content">
      <h2>Welcome to the Colorful World of The Little Prince</h2>
      <p>Explore the beauty and wonder of The Little Prince's universe!</p>
      <div id="image-container">
        <img src="images/little_prince.jpg.jpg" alt="The Little Prince" id="little-prince-image">
        <img src="images/rose_image.jpg" alt="The Rose" id="rose-image">
      </div>
    </section>

    <!-- Dynamically built dropdowns -->
    <section id="dropdowns">
      <h2>Tourist Attractions</h2>
      <form>
        <label for="county">County:</label>
        <select id="county" onchange="updateCityDropdown()">
          <option value="" selected disabled>Select an option</option> <!-- Textul implicit de selecție -->
          <option value="county1">France</option>
          <option value="county2">Florida</option>
          <option value="county3">New York</option>
        </select>
        <br>
        <label for="city">Objectif:</label>
        <select id="city">
          <!-- City options will be dynamically updated based on the selected county -->
        </select>
      </form>
    </section>

    <!-- Buton de căutare -->
    <section id="search">
      <h2>Search for Tourist Attraction</h2>
      <button id="searchBtn" onclick="searchDestination()">Search</button>
    </section>

    <!-- List with "View more" button -->
    <section id="list">
  <h2>Additional Link Resources about Little Prince</h2>
  <ul>
    <li><a href="https://www.youtube.com/watch?v=9gARHWfXE40" target="_blank"><b>Little Prince the Movie</b></a></li>
    <li><a href="https://www.youtube.com/watch?v=t9fZx94wcYg" target="_blank"><b>A Children's Movie For Adults: The Little Prince</b></a></li>
    <li style="display: none;"><a href="https://www.youtube.com/watch?v=Qq6iiLkToK4" target="_blank"><b>Little Prince: Book Summary</b></a></li>
    <li style="display: none;"><a href="https://www.youtube.com/watch?v=gDZ7PTzNJdg" target="_blank"><b>The Little Prince turns 81 and still remains relevant. Here's why</b></a></li>
    <li style="display: none;"><a href="https://www.youtube.com/watch?v=Ksr40ha3QS0" target="_blank"><b>RED NOSE Society-Micul Print, Spectacol pentru Oameni Mari</b></a></li>
    <!-- More list items can be added here -->
  </ul>
  <button id="viewMoreBtn" onclick="showMoreItems()">View more</button>
</section>
  </main>
  <footer>
    <p>&copy; 2024 The Little Prince. All rights reserved.</p>
  </footer>
  <script src="script.js"></script>

  <script>
    // Dynamically update city dropdown based on selected county
    function updateCityDropdown() {
      const countyDropdown = document.getElementById("county");
      const cityDropdown = document.getElementById("city");
      const selectedCounty = countyDropdown.value;

      // Clear previous city options
      cityDropdown.innerHTML = "";

      // Add new city options based on the selected county
      if (selectedCounty === "county1") {
        addCityOption("Parc du Petit Prince");
        addCityOption("Little Prince Statue Sits");
        addCityOption("Château d'enfance de Saint-Exupéry");
      } else if (selectedCounty === "county2") {
        addCityOption("The Little Prince Immersive Experience");
      } else if (selectedCounty === "county3") {
        addCityOption("Little Prince Sculpture");
      }
    }
  
    // Helper function to add city option to the dropdown
    function addCityOption(cityName) {
      const cityDropdown = document.getElementById("city");
      const option = document.createElement("option");
      option.text = cityName;
      cityDropdown.add(option);
    }

    // Show more items in the list
    function showMoreItems() {
      const listItems = document.querySelectorAll("#list li");
      listItems.forEach((item, index) => {
        if (index >= 2) {
          item.style.display = "list-item";
        }
      });
      document.getElementById("viewMoreBtn").style.display = "none";
    }
    var currentSelection;

// Funcție pentru a restabili selecția la opțiunea anterioară
function restoreCountySelection() {
    var select = document.getElementById("county");
    if (currentSelection) {
        for (var i = 0; i < select.options.length; i++) {
            if (select.options[i].value === currentSelection) {
                select.selectedIndex = i;
                break;
            }
        }
    }
}

document.getElementById("county").addEventListener("change", function() {
    currentSelection = this.value; // Salvează selecția curentă
});

document.getElementById("county").addEventListener("click", function() {
    restoreCountySelection(); // Restabilește selecția anterioară la fiecare clic pe caseta de selecție
});
    // Funcție pentru căutarea destinației și redirecționarea către pagina corespunzătoare
    function searchDestination() {
      const selectedCity = document.getElementById("city").value;
      if (selectedCity === "Parc du Petit Prince") {
        window.open("https://parcdupetitprince.com/parc/attractions", "_blank"); // Deschide pagina pentru Parc du Petit Prince într-o filă sau fereastră nouă
      } else if (selectedCity === "Little Prince Statue Sits") {
        window.open("https://www.smithsonianmag.com/smart-news/a-statue-of-the-little-prince-unveiled-in-manhattan-180982981/", "_blank"); // Deschide pagina pentru Little Prince Statue Sits într-o filă sau fereastră nouă
      } else if (selectedCity === "Château d'enfance de Saint-Exupéry") {
        window.open("https://fr.wikipedia.org/wiki/Ch%C3%A2teau_de_Saint-Maurice-de-R%C3%A9mens", "_blank"); // Deschide pagina pentru Château d'enfance de Saint-Exupéry într-o filă sau fereastră nouă
      } else if (selectedCity === "The Little Prince Immersive Experience") {
        window.open("https://thelittleprinceworld.com/", "_blank"); // Deschide pagina pentru The Little Prince Immersive Experience într-o filă sau fereastră nouă
      } else if (selectedCity === "Little Prince Sculpture") {
        window.open("https://hyperallergic.com/846079/new-york-gets-its-very-own-little-prince-sculpture/", "_blank"); // Deschide pagina pentru Little Prince Sculpture într-o filă sau fereastră nouă
      }
    }
  </script>
</body>
</html>
<?php include('partials-front/footer.php');?>