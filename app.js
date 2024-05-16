let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'CAMASA PICTATA MANUAL',
        image: 'camasa.webp',
        price: 260
    },
    {
        id: 2,
        name: 'STILOU',
        image: 'stilou.jpg',
        price: 100
    },
    {
        id: 3,
        name: 'CEAS PERETE',
        image: 'ceas.avif',
        price: 220
    },
    {
        id: 4,
        name: 'FIGURINA THE LITTLE PRINCE UNDER THE ROSE ',
        image: 'figurina.jpeg',
        price: 125
    },
    {
        id: 5,
        name: 'TERMOS LE PETIT PRINCE',
        image: 'termos.jpg',
        price: 90
    },
    {
        id: 6,
        name: 'SET MAGNETI',
        image: 'magneti.jpeg',
        price: 50
    },
    {
        id: 7,
        name: 'TRICOU LE PETIT PRINCE',
        image: 'tricou.jpg',
        price: 100
    },
    {
        id: 8,
        name: 'SET PINURI LE PETIT PRINCE',
        image: 'pin.jpg',
        price: 50
    },
    {
        id: 9,
        name: 'GEANTA LE PETIT PRINCE',
        image: 'geanta',
        price: 120
    },
    {
        id: 10,
        name: 'PENAR LE PETIT PRINCE',
        image: 'penar.jpg',
        price: 60
    },
    {
        id: 11,
        name: 'LEGO LE PETIT PRINCE',
        image: 'lego.webp',
        price: 100
    },
    {
        id: 12,
        name: 'LEGO CASA LE PETIT PRINCE',
        image: 'jucarii.webp',
        price: 130
    },
    {
        id: 13,
        name: 'CUTIE DECORATIVA LE PETIT PRINCE',
        image: 'cutie-decorativa.webp',
        price: 60
    },
    {
        id: 14,
        name: 'SET BIROU LE PETIT PRINCE',
        image: 'set-rechizite.jpg',
        price: 180
    },
    {
        id: 15,
        name: 'BOL LE PETIT PRINCE',
        image: 'bol.avif',
        price: 40
    },
    {
        id: 16,
        name: 'CANA LE PETIT PRINCE',
        image: 'cana.jpg',
        price: 50
    },
    {
        id: 17,
        name: 'SET CERAMICA LE PETIT PRINCE',
        image: 'set-cana.jpg',
        price: 100
    },
    {
        id: 18,
        name: 'SET POSTCARDS LE PETIT PRINCE',
        image: 'postcards.jpg',
        price: 15
    },
    {
        id: 19,
        name: 'AGENDA LE PETIT PRINCE',
        image: 'agenda.jpg',
        price: 90
    },
    {
        id: 20,
        name: 'ESARFA LE PETIT PRINCE',
        image: 'esarfa.jpg',
        price: 100
    },
    {
        id: 21,
        name: 'SAMPON ORGANIC LE PETIT PRINCE',
        image: 'sampon-organic.jpg',
        price: 120
    },
    {
        id: 22,
        name: 'MEDALION LE PETIT PRINCE',
        image: 'medalion.jpg',
        price: 300
    },
    {
        id: 23,
        name: 'CUTIE MUZICALA LE PETIT PRINCE',
        image: 'cutie-muzicala.jpg',
        price: 150
    },
    {
        id: 24,
        name: 'STATUETA LE PETIT PRINCE',
        image: 'statueta.jpg',
        price: 110
    },
];
let listCards  = [];
function initApp(){
    //am ad acum
     // Verificăm dacă există elemente salvate în localStorage
     const storedItems = localStorage.getItem('cartItems');

     // Dacă există elemente salvate în localStorage, le încărcăm în listCards
     if (storedItems) {
         listCards = JSON.parse(storedItems);
     }
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="images/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    });
    reloadCard();
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    //acm am adaugat
    localStorage.setItem('cartItems', JSON.stringify(listCards));

    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        if(value !== null) { // Verificăm dacă valoarea nu este null
            totalPrice = totalPrice + value.price;
            count = count + value.quantity;
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="images/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div>
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>`;
            listCard.appendChild(newDiv);
        }
    });
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity) {
    if (quantity === 0) {
        delete listCards[key];
    } else {
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }

    // Actualizăm datele în localStorage
    localStorage.setItem('cartItems', JSON.stringify(listCards));

    // Verificăm dacă coșul de cumpărături este gol și, în caz afirmativ, eliminăm cheia 'cartItems' din localStorage
    if (Object.keys(listCards).length === 0) {
        localStorage.removeItem('cartItems');
    }

    reloadCard();
}

// Variabila pentru a salva poziția anterioară a paginii
let previousScrollPosition = 0;

// Funcția pentru a deschide imaginea mărită
function expandImg(imageSrc) {
    const expandedImg = document.getElementById("expandedImg");
    expandedImg.src = imageSrc;

    // Salvează poziția anterioară a paginii
    previousScrollPosition = window.pageYOffset || document.documentElement.scrollTop;

    // Centrare imagine mărită
    document.querySelector(".overlay").style.display = "flex";

    // Blochează scroll-ul paginii principale
    document.body.style.overflow = "hidden";
}

// Funcția pentru a închide imaginea mărită
function closeExpandedImg() {
    const expandedImg = document.getElementById("expandedImg");
    expandedImg.src = ""; // Resetați calea către imaginea sursă la un șir gol
    document.querySelector(".overlay").style.display = "none";

    // Reluare poziția anterioară a paginii
    window.scrollTo(0, previousScrollPosition);

    // Permite scroll-ul paginii principale
    document.body.style.overflow = "auto";
}

// Adaugăm evenimentul de clic pentru imaginile produselor
const productImages = document.querySelectorAll(".product-image img");
productImages.forEach(image => {
    image.addEventListener("click", () => {
        expandImg(image.src);
    });
});

// Adaugăm evenimentul de clic pentru overlay pentru a închide imaginea mărită
document.querySelector(".overlay").addEventListener("click", (event) => {
    if (event.target.classList.contains("overlay")) {
        closeExpandedImg();
    }
});

$(document).ready(function() {
    // Eveniment de clic pentru butonul de căutare
    $("#searchButton").on("click", function() {
        const selectedValue = $("#products").val().toLowerCase();
        $(".item").each(function() {
            const productName = $(this).find(".title").text().toLowerCase();
            if (productName.includes(selectedValue) || selectedValue === "") {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Eveniment de clic pentru butonul de resetare
    $("#resetButton").on("click", function() {
        $(".item").show(); // Afișează toate elementele
        $("#products").val(""); // Resetează selectul
    });
    $(".item").on("click", function() {
        const imageSrc = $(this).find("img").attr("src");
        expandImg(imageSrc);
    });
});
