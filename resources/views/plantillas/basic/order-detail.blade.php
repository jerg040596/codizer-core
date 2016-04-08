@extends('plantillas.basic.layout-plantilla-basic')

@section('cotent')

    <section class="title-basic-section">
        <article>
            <h3>
                Detalle de la orden
                <a href="{{ route('store.front.product.orden.show', [$tienda->store_route]) }}" class="btn btn-sm btn-border-yellow right">Volver al carrito</a>
            </h3>

        </article>
    </section>

    <section class="container-products">
        <article>

            @if( count($cart) === 0)
                <div>No hay Items</div>
            @else
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Importe</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td width="120px"><img src="{{ asset('/media/photo-product/' . $item->img) }}" width="100"/></td>
                            <td style="text-align: left">
                                <ul>
                                    <li class="cd-link">{{ $item->nombre }}</li>
                                    <li>${{ $item->precio  . ' ' . $item->tipo_oferta. $item->regla_porciento . '%'}}</li>
                                </ul>
                            </td>
                            <td>${{ number_format($item->final_price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ number_format($item->final_price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><h3>Total</h3></td>
                            <td><h3>${{ number_format($total, 2) }}</h3></td>
                        </tr>
                </tbody>
            </table>
            @endif

                <a href="{{ route('payment') }}" class="btn">Pagar con Paypal</a>
                <a href="#" class="btn">Tarjeta de credito</a>
                <a href="#" class="btn">Deposito</a>

        </article>
    </section>

@endsection


@section('modals')

@endsection

@section('extra-js')
@endsection