
// Menu hamburguesa


function mostrarMenu() {
    const menuLista = document.getElementById('menuLista');
    menuLista.classList.toggle('show'); // Alterna la clase 'show' para mostrar/ocultar el menú
}




// darkmode


const btn_darkmode = document.getElementById('darkmode');

btn_darkmode.addEventListener('click', function(){
    document.body.classList.toggle('dark');
});




// Localstorage

// Obtener elementos
const modoColorBtn = document.querySelector('#darkmode input');

// Cargar estado desde Local Storage
function cargarEstadoDesdeLocalStorage() {
    const estadoGuardado = localStorage.getItem('modoColor');
    if (estadoGuardado === 'checked') {
        modoColorBtn.checked = true;
        document.body.classList.remove('dark'); // Aplica el modo oscuro
    } else {
        modoColorBtn.checked = false;
        document.body.classList.add('dark'); // Aplica el modo claro
    }
}


// Guardar estado en Local Storage
function guardarEstadoEnLocalStorage() {
    if (modoColorBtn.checked) {
        localStorage.setItem('modoColor', 'checked');
        document.body.classList.remove('dark'); // Aplica el modo oscuro
    } else {
        localStorage.setItem('modoColor', 'unchecked');
        document.body.classList.add('dark'); // Aplica el modo claro
    }
}

// Evento para cambiar el estado del modo oscuro
modoColorBtn.addEventListener('change', guardarEstadoEnLocalStorage);

// Cargar el estado al iniciar la página
document.addEventListener('DOMContentLoaded', cargarEstadoDesdeLocalStorage);








// Acordeon

// logica 
// cuando se hace click en el h2 
// se quite la clase activo de todos los bloques
// se añde la clase activo al bloque con la posicion del h2

const bloques = document.querySelectorAll(".bloque");
const h2 = document.querySelectorAll(".h2");

h2.forEach((cadaH2, i) => {
  h2[i].addEventListener("click", () => {
    // Verifica si el bloque ya esta activo
    if (bloques[i].classList.contains("activo")) {
      // Si está activo, quita la clase activo
      bloques[i].classList.remove("activo");
    } else {
      // Si no esta activo, quita la clase activo de todos los bloques
      bloques.forEach((cadaBloque) => {
        cadaBloque.classList.remove("activo");
      });
      // Agrega la clase activo al bloque actual
      bloques[i].classList.add("activo");
    }
  });
});





// Acordeon


// Selecciona todos los elementos con la clase "opcion" y los almacena en la variable opciones
const opciones = document.querySelectorAll(".opcion");

// Selecciona el acordeón móvil y lo almacena en la variable acordeonMovil
const acordeonMovil = document.querySelector(".acordeon-movil");

// Selecciona el acordeón de escritorio y lo almacena en la variable acordeonEscritorio
const acordeonEscritorio = document.querySelector(".acordeon-escritorio");

// Selecciona el texto de PC y lo almacena en la variable textoPc
const textoPc = document.querySelector(".h2-pc");

// Selecciona el texto móvil y lo almacena en la variable textoMovil
const textoMovil = document.querySelector(".h2-movil");

// Recorre cada elemento en la lista de opciones
opciones.forEach((opcion) => {
    // Asigna una función al evento "onclick" de cada opción
    opcion.onclick = () => {
        // Obtiene el valor del atributo "data-opcion" del elemento clicado
        const seleccion = opcion.getAttribute("data-opcion");

        // Muestra el acordeón móvil si la selección es "movil", de lo contrario lo oculta
        acordeonMovil.style.display = seleccion === "movil" ? "block" : "none";

        // Muestra el acordeón de escritorio si la selección es "escritorio", de lo contrario lo oculta
        acordeonEscritorio.style.display = seleccion === "escritorio" ? "block" : "none";

        // Muestra el texto móvil si la selección es "movil", de lo contrario lo oculta
        textoMovil.style.display = seleccion === "movil" ? "block" : "none";

        // Muestra el texto de PC si la selección es "escritorio", de lo contrario lo oculta
        textoPc.style.display = seleccion === "escritorio" ? "block" : "none";
    };
});






// Filtros


const filtrobuttons = document.querySelectorAll('.filtros-container button');
const filtrocards = document.querySelectorAll('.grid-container .grid-item');

// Función para aplicar filtros
const filtercards = (e) => {
    // Elimina la clase 'active' del botón anterior
    document.querySelector(".active").classList.remove("active");
    // Añade la clase 'active' al botón actual
    e.target.classList.add("active");

    // Obtiene el valor del filtro seleccionado
    const filterValue = e.target.getAttribute("data-name");

    // Itera sobre todas las imágenes (grid-items)
    filtrocards.forEach((card) => {
        // Si el filtro es 'all', muestra todas las imágenes
        if (filterValue === "all") {
            card.style.display = "block";
        } else {
            // Compara el data-name del filtro con el data-name de la imagen
            if (card.getAttribute("data-name") === filterValue) {
                card.style.display = "block"; // Muestra si coincide
            } else {
                card.style.display = "none"; // Oculta si no coincide
            }
        }
    });
};

// Agregar eventos de clic a cada botón de filtro

filtrobuttons.forEach((button) => {
    button.addEventListener("click", filtercards);
});