function calc(from){
  var Monto = parseFloat($("#monto").val());//se toma el monto que este en su campo
  var NDias =parseInt( $("#dias").val());//se toma el valor del campo dias
  var Fecha = new Date($("#fecha").val()+" GMT-6:00");//se toma el valor del campo fecha
  var Mora = parseFloat($("#mora").val());//se toma el valor del campo mora
  var ultimo_pago =new Date(credit["ult_pago"]+" GMT-6:00");//se toma el valor de la fecha del ultimo pago
  var saldo_pendiente=parseFloat(credit["json_array"]["saldo"]);//setoma el valor del monto pendiente
  var Interes=parseFloat((saldo_pendiente*credit["interes"])).toFixed(2);//se calcula el interes a pagar este mes
  var Abonado=0;//se inicializa el monto abonado
  var nuevo_saldo=parseFloat(saldo_pendiente);//se inicializa el saldo pendiente igual al monto pendiente de pago
  var tipo =credit["json_array"]["tipo"];//se toma el tipo de factura que se usa.
  //se verifica que se haya colocado una fecha de no ser asi se coloca la fecha de hoy.
  if(isNaN(Fecha.getTime())){console.log("fecha mala"); Fecha = new Date(); $("#fecha").val(Fecha.getFullYear()+"-"+(Fecha.getMonth()+1)+"-"+Fecha.getDate()); }
  else{
    if(!NDias){//si no se han puesto manualmente los dias desde el ultimo_pago
      if(Fecha.getTime() > ultimo_pago.getTime()){//se comprueba que la fecha colocada no sea la misma del ultimo pago
        var dif= Math.abs(Fecha-ultimo_pago);//se saca la diferencia en milisegundos de ambas fechas
        var days =Math.ceil( dif/(1000 * 3600 * 24));//se convierte a dias
        if(days>30){//si la diferencia es mas de 30 dias entonces se devuelve a 30 el valor por default
          days=30;
        }
        NDias=days;$("#dias").val(days);//y cambia el valor de la variable dias en base a este calculo
      }
    }
  }
  //se verifica si se ha escrito el numero de dias de no ser asi se pone por default 30
  if(!NDias){console.log("dias invalidos");NDias=30;$("#dias").val(30);}else{
    if(NDias<=0||NDias>30){NDias=30;$("#dias").val(30);}else{//verifica si es un valor valido sino lo corrije
      Interes= (Interes/30)*NDias;Interes=Interes.toFixed(2);//si hay un numero de dias entonces se calcula el interes en base a estos dias de anticipacion
    }
  }
  if(!Mora){console.log("Mora invalida"); Mora=0; $("#mora").val(Mora);}//verifica si ha escrito un valor para la mora en caso contrario se pone 0 por defecto
  else{if(Mora<0){Mora=0;$("#mora").val(0);}}//si la mora es un numero negativo se corrije
  if(!Monto){console.log("Monto invalida");Monto=Interes;$("#monto").val(Monto);}//se ve si ha puesto un valor en monto en caso contrario se pondra el interes pendiente
  else{if(Monto<0){Monto=0;$("#monto").val(0);}}//si el monto se pone un numero menor a 0 se corrije
  $("#interes").val(Interes);//se pone el interes calculado
  Abonado = Monto -Interes-Mora;Abonado=Abonado.toFixed(2);//se calcula el total abonado
  if(Abonado>nuevo_saldo){//si el valor abonado se pasa del saldo restante
    Monto = +nuevo_saldo + +Interes + +Mora;Monto=Monto.toFixed(2);
    $("#monto").val(Monto);//seajusta el motno a caval cubrir el saldo faltante nada mas
    Abonado = Monto -Interes-Mora;Abonado=Abonado.toFixed(2);//y se vuelve a calcular
  }
  $("#abonado").val(Abonado);//se ṕone el monto abonado
  nuevo_saldo=nuevo_saldo-Abonado;nuevo_saldo=nuevo_saldo.toFixed(2);//se calcula el saldo pendiente
  $("#saldo").val(nuevo_saldo);//se pone el saldo pendiente
  console.log(credit);
  //console.log(credit["json_array"]);
  $("#total").val(Abonado);//se manda el valor del total abonado a su campo oculto.

  if(tipo!="consumidor"){//se verifica el tipo de factura si es credito fiscal
    var subtotal=(Interes/1.13);subtotal=subtotal.toFixed(2);//se calcula y redondea el subtotal
    var iva = subtotal*0.13;iva=iva.toFixed(2);//se calcula y redondea el iva
    $("#subtotal").val(subtotal);$("#iva").val(iva);//se manda el iva y subtotal a sus campos.
  }
}
/*
info deducida del codigo viejo:
fp=fecha anterior
pint = %interes = 0.03
mnto= mt1 = id de este campo monto
mora = mora1 = id del campo de mora de esta fila
mr =mr1 = campo oculto que copia el valor en mora1
inte = interes1 = campo donde se calcula el interes de esta cuota
inateres = ((TOTAL*pint)/30)*ndays =total del interes al monto entre dias del mes por numero de dias de anticipacion
int = int1 = duplicado en hiddend el campo interes1
total = total1 el total abonado en esta cuota = monto-(mora+interes)
tot = tot1 = campo duplicado oculto del total abonado
fcha = fh1 = fecha en que se registra el pago de la cuota
nsaldo = nuevosaldo1 = lo que queda del monto pendiente de pago (total-TOTAL)
ns = ns1 = duplicado de nuevosaldo por el abono de la cuota actual
sa = nf1 = saldo anterior o saldo pendiente de pago en un campo oculto
ty= FC1 = es si es consumidor final o credito fiscal la factura (FC o CF) en el caso de ser CF hay que sacar el iva que ya traen los intereses
y el subtotal del interes sin el iva que ya trae incluido.
iva = (interes/1.13)*0.13 ; subtotal = (interes/1.13);
nday =ndias1= numero de dias transcurrido desde el ultimo pago hasta el dia de hoy
*/
