
let data = JSON.parse($('#data-chart').val());
let data_db = document.getElementById('data-db');
let carrito = [];
let db = {};

let subtotal = 0.0;
let desc = 0.0;

let td_subtotal = document.getElementById('subtotal');
let td_desc = document.getElementById('desc');
let td_total = document.getElementById('total');

function addService(cod){
    let servicio = data.filter((data) => {
        return data.cod === cod;
    });

    if(carrito.length !== 0){
    
        let car = carrito.filter(cto => cto.codigo !== cod); /** Aqui viene todos menos el code que ya filtre arriba */

        let service = carrito.find(cto => cto.codigo === cod);
        let aux = {};

        if(service !== undefined){

            aux['cantidad'] = (parseInt (service['cantidad']) + 1);
            aux['codigo'] = cod;
            aux['descripcion'] = servicio[0]['descripcion'];
            aux['precio_unitario'] = servicio[0]['precio'];
            aux['total'] = (parseFloat(service['total']) + parseFloat(servicio[0]['precio']));
            let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));

            subtotal = (parseFloat(subtotal) + parseFloat(servicio[0]['precio']));
            desc = (parseFloat(desc) + parseFloat(desc_p));
            
        }else{

            aux['cantidad'] = "1";
            aux['codigo'] = cod;
            aux['descripcion'] = servicio[0]['descripcion'];
            aux['precio_unitario'] = servicio[0]['precio'];
            aux['total'] = servicio[0]['precio'];
            let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));

            subtotal = (parseFloat(subtotal) + parseFloat(servicio[0]['precio']));
            desc = (parseFloat(desc) + parseFloat(desc_p));
        }
        
        car.push(aux)
        carrito = car;

    }else{
        let aux = {};
        aux['cantidad'] = "1";
        aux['codigo'] = cod;
        aux['descripcion'] = servicio[0]['descripcion'];
        aux['precio_unitario'] = servicio[0]['precio'];
        aux['total'] = servicio[0]['precio'];
        let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));

        subtotal = (parseFloat(subtotal) + parseFloat(servicio[0]['precio']));
        desc = (parseFloat(desc) + parseFloat(desc_p));

        carrito.push(aux);

    }

    td_desc.textContent = "$ "+desc; 
    td_subtotal.textContent = "$ "+subtotal; 
    td_total.textContent = "$ "+ (subtotal - desc); 
   
    db['servicios'] = carrito;
    db['total'] = (subtotal - desc);
    db['subtotal'] = subtotal;
    db['desc'] = desc;

    $('#data-db').eq(0).val(JSON.stringify(db));

    render_tbody();
    
}

function removeService(cod){
    
    let servicio = data.filter((data) => {
        return data.cod === cod;
    });

    let car = carrito.filter(cto => cto.codigo !== cod); 
    let service = carrito.find(cto => cto.codigo === cod);
    let aux = {};

    if(service !== undefined){

        let cantidad = (parseInt (service['cantidad']) - 1)
        
        if(cantidad > 0){    
            aux['cantidad'] = cantidad;
            aux['codigo'] = cod;
            aux['descripcion'] = servicio[0]['descripcion'];
            aux['precio_unitario'] = servicio[0]['precio'];
            aux['total'] = (parseInt(service['total']) - parseInt(servicio[0]['precio']));
            let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));

            subtotal = (parseFloat(subtotal) - parseFloat(servicio[0]['precio']));
            desc = (parseFloat(desc) - parseFloat(desc_p));

            car.push(aux);
            carrito = car;
            td_desc.textContent ="$ "+ desc; 
            td_subtotal.textContent ="$ "+ subtotal; 
            td_total.textContent = "$ "+(subtotal - desc); 

            db['servicios'] = carrito;
            db['total'] = (subtotal - desc);
            db['subtotal'] = subtotal;
            db['desc'] = desc;
        
            $('#data-db').eq(0).val(JSON.stringify(db));

            render_tbody();     
        }else{
            let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));
            subtotal = (parseFloat(subtotal) - parseFloat(servicio[0]['precio']));
            desc = (parseFloat(desc) - parseFloat(desc_p));
            
            carrito = car;
            
            td_desc.textContent = "$ "+desc; 
            td_subtotal.textContent = "$ "+subtotal; 
            td_total.textContent = "$ "+(subtotal - desc); 

            db['servicios'] = carrito;
            db['total'] = (subtotal - desc);
            db['subtotal'] = subtotal;
            db['desc'] = desc;

            $('#data-db').eq(0).val(JSON.stringify(db));

            render_tbody(); 
        }
           
    }

}

function removeServiceAll(cod){

    let servicio = data.filter((data) => {
        return data.cod === cod;
    });

    let car = carrito.filter(cto => cto.codigo !== cod); 
    let service = carrito.find(cto => cto.codigo === cod);

    let desc_p = ( (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']) ) * service['cantidad']);
    subtotal = (parseFloat(subtotal) - parseFloat(service['total']));
    desc = (parseFloat(desc) - parseFloat(desc_p));

    carrito = car;
    td_desc.textContent = "$ " + desc; 
    td_subtotal.textContent = "$ " + subtotal; 
    td_total.textContent = "$ "+(subtotal - desc); 

    db['servicios'] = carrito;
    db['total'] = (subtotal - desc);
    db['subtotal'] = subtotal;
    db['desc'] = desc;

    $('#data-db').eq(0).val(JSON.stringify(db)); 

    render_tbody(); 
}

function removeAllServices(){

}

function render_tbody(){
    
    $("#tbody_carrito").empty();

    carrito.forEach(element => {

        let row_2 = document.createElement('tr');
        let row_2_data_1 = document.createElement('td');
        let row_2_data_2 = document.createElement('td');
        let row_2_data_3 = document.createElement('td');
        let row_2_data_4 = document.createElement('td');
        let row_2_data_5 = document.createElement('td');
        let row_2_data_6 = document.createElement('td');

        row_2_data_1.classList.add('align-center'); 
        row_2_data_2.classList.add('align-center'); 
        row_2_data_3.classList.add('align-center'); 
        row_2_data_4.classList.add('align-center'); 
        row_2_data_5.classList.add('align-center'); 
        row_2_data_6.classList.add('align-center');  
        
        row_2_data_1.innerHTML = element.cantidad;
        row_2_data_2.innerHTML = element.codigo;
        row_2_data_3.innerHTML = element.descripcion;
        row_2_data_4.innerHTML = element.precio_unitario;
        row_2_data_5.innerHTML = element.total;
        row_2_data_6.innerHTML = 
        '<a onclick = "removeService('+"'"+element.codigo+"'"+');" class="btn btn-outline-danger"><i class="fas fa-minus"></i></a>' + 
            " " +
            '<a onclick = "removeServiceAll('+"'"+element.codigo+"'"+');" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>' 
        ;

        row_2.appendChild(row_2_data_1);
        row_2.appendChild(row_2_data_2);
        row_2.appendChild(row_2_data_3);
        row_2.appendChild(row_2_data_4);
        row_2.appendChild(row_2_data_5);
        row_2.appendChild(row_2_data_6);
        tbody_carrito.appendChild(row_2);
    });


}



// Variables
let baseDeDatos = [
    
    {
        cod:'SC0001',
        id: 2,
        nombre: 'Cebolla',
        precio: 1.2,
        imagen: 'cebolla.jpg'
    },
    {
        cod:'SC0002',
        id: 3,
        nombre: 'Calabacin',
        precio: 2.1,
        imagen: 'calabacin.jpg'
    },
    {
        cod:'SC0003',
        id: 4,
        nombre: 'Fresas',
        precio: 0.6,
        imagen: 'fresas.jpg'
    }

];



const DOMitems = document.querySelector('#items');
const DOMcarrito = document.querySelector('#carrito');
const DOMtotal = document.querySelector('#total');
const DOMbotonVaciar = document.querySelector('#boton-vaciar');

// Funciones

/**
 * Dibuja todos los productos a partir de la base de datos. No confundir con el carrito
 */
function renderizarProductos() {
    baseDeDatos.forEach((info) => {
        // Estructura
        const miNodo = document.createElement('div');
        miNodo.classList.add('card', 'col-sm-4');
        // Body
        const miNodoCardBody = document.createElement('div');
        miNodoCardBody.classList.add('card-body');
        // Titulo
        const miNodoTitle = document.createElement('h5');
        miNodoTitle.classList.add('card-title');
        miNodoTitle.textContent = info.nombre;
        // Imagen
        const miNodoImagen = document.createElement('img');
        miNodoImagen.classList.add('img-fluid');
        miNodoImagen.setAttribute('src', info.imagen);
        // Precio
        const miNodoPrecio = document.createElement('p');
        miNodoPrecio.classList.add('card-text');
        miNodoPrecio.textContent = info.precio + '€';
        // Boton 
        const miNodoBoton = document.createElement('button');
        miNodoBoton.classList.add('btn', 'btn-primary');
        miNodoBoton.textContent = '+';
        miNodoBoton.setAttribute('marcador', info.id);
        miNodoBoton.addEventListener('click', anyadirProductoAlCarrito);
        // Insertamos
        miNodoCardBody.appendChild(miNodoImagen);
        miNodoCardBody.appendChild(miNodoTitle);
        miNodoCardBody.appendChild(miNodoPrecio);
        miNodoCardBody.appendChild(miNodoBoton);
        miNodo.appendChild(miNodoCardBody);
        DOMitems.appendChild(miNodo);
    });
}

/**
 * Evento para añadir un producto al carrito de la compra
 */
function anyadirProductoAlCarrito(evento) {
    // Anyadimos el Nodo a nuestro carrito
    carrito.push(evento.target.getAttribute('marcador'))
    // Calculo el total
    calcularTotal();
    // Actualizamos el carrito 
    renderizarCarrito();

}

/**
 * Dibuja todos los productos guardados en el carrito
 */
function renderizarCarrito() {
    // Vaciamos todo el html
    DOMcarrito.textContent = '';
    // Quitamos los duplicados
    const carritoSinDuplicados = [...new Set(carrito)];
    // Generamos los Nodos a partir de carrito
    carritoSinDuplicados.forEach((item) => {
        // Obtenemos el item que necesitamos de la variable base de datos
        const miItem = baseDeDatos.filter((itemBaseDatos) => {
            // ¿Coincide las id? Solo puede existir un caso
            return itemBaseDatos.id === parseInt(item);
        });
        // Cuenta el número de veces que se repite el producto
        const numeroUnidadesItem = carrito.reduce((total, itemId) => {
            // ¿Coincide las id? Incremento el contador, en caso contrario no mantengo
            return itemId === item ? total += 1 : total;
        }, 0);
        // Creamos el nodo del item del carrito
        const miNodo = document.createElement('li');
        miNodo.classList.add('list-group-item', 'text-right', 'mx-2');
        miNodo.textContent = `${numeroUnidadesItem} x ${miItem[0].nombre} - ${miItem[0].precio}€`;
        // Boton de borrar
        const miBoton = document.createElement('button');
        miBoton.classList.add('btn', 'btn-danger', 'mx-5');
        miBoton.textContent = 'X';
        miBoton.style.marginLeft = '1rem';
        miBoton.dataset.item = item;
        miBoton.addEventListener('click', borrarItemCarrito);
        // Mezclamos nodos
        miNodo.appendChild(miBoton);
        DOMcarrito.appendChild(miNodo);
    });
}

/**
 * Evento para borrar un elemento del carrito
 */
function borrarItemCarrito(evento) {
    // Obtenemos el producto ID que hay en el boton pulsado
    const id = evento.target.dataset.item;
    // Borramos todos los productos
    console.log(carrito);
    carrito = carrito.filter((carritoId) => {
        return carritoId !== id;
    });


    // volvemos a renderizar
    renderizarCarrito();
    // Calculamos de nuevo el precio
    calcularTotal();
}

/**
 * Calcula el precio total teniendo en cuenta los productos repetidos
 */
function calcularTotal() {
    // Limpiamos precio anterior
    total = 0;
    // Recorremos el array del carrito
    carrito.forEach((item) => {
        // De cada elemento obtenemos su precio
        const miItem = baseDeDatos.filter((itemBaseDatos) => {
            return itemBaseDatos.id === parseInt(item);
        });
        total = total + miItem[0].precio;
    });
    // Renderizamos el precio en el HTML
    DOMtotal.textContent = total.toFixed(2);
}

/**
 * Varia el carrito y vuelve a dibujarlo
 */
function vaciarCarrito() {
    // Limpiamos los productos guardados
    carrito = [];
    // Renderizamos los cambios
    renderizarCarrito();
    calcularTotal();
}

// Eventos
DOMbotonVaciar.addEventListener('click', vaciarCarrito);

// Inicio
renderizarProductos();

