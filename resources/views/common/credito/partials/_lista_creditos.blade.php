<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Interes</th>
                <th scope="col"># Coutas</th>
                <th scope="col">Dia Pago</th>
                <th scope="col">Estado</th>
                <th scope="col">Opcion</th>
            </tr>
        </thead>
        <tbody>
            
        @if(!empty($info['credito']))
            @foreach ($info['credito'] as $credito)
                <tr>
                    <th scope="row">{{$credito->id}}</th>
                    <td>{{$credito->json_array['fecha_venta']}}</td>
                    <td>{{$credito->monto}}</td>
                    <td>{{$credito->interes * 100}}%</td>
                    <td>{{$credito->n_coutas}}</td>
                    <td>{{$credito->dia_pago}}</td>
                    <td>@if($credito->pendiente === 1)
                        Pendiente
                        @else
                        Pagado
                        @endif
                    </td>
                    <td>@if($credito->pendiente === 1)
                        <a class="" href="{{route('credito.pay',$credito->id)}}">Pagar</a>
                        @else
                            **--**
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
                <td>NO HAY DATOS</td>
            </tr> 
        @endif

        </tbody>
    </table>
</div>