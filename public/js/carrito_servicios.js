
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
            aux['area_empresa'] = servicio[0]['area_empresa'];
            aux['precio_unitario'] = servicio[0]['precio'];
            aux['total'] = (parseFloat(service['total']) + parseFloat(servicio[0]['precio']));
            let desc_p = (parseFloat(servicio[0]['precio']) * parseFloat(servicio[0]['descuento']));

            subtotal = (parseFloat(subtotal) + parseFloat(servicio[0]['precio']));
            desc = (parseFloat(desc) + parseFloat(desc_p));
            
        }else{

            aux['cantidad'] = "1";
            aux['codigo'] = cod;
            aux['descripcion'] = servicio[0]['descripcion'];
            aux['area_empresa'] = servicio[0]['area_empresa'];
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
        aux['area_empresa'] = servicio[0]['area_empresa'];
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
    td_total.textContent = "$ "+ (subtotal - desc); 

    db['servicios'] = carrito;
    db['total'] = (subtotal - desc);
    db['subtotal'] = subtotal;
    db['desc'] = desc;

    $('#data-db').eq(0).val(JSON.stringify(db)); 

    render_tbody(); 
}

function removeAllServices(){
     
    $("#tbody_carrito").empty();
    carrito = [];
    db = {};

    $('#data-db').eq(0).val(JSON.stringify([])); 
    td_desc.textContent = "$ 0"; 
    td_subtotal.textContent = "$ 0"; 
    td_total.textContent = "$ 0"; 
    
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

