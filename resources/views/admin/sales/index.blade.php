@extends('app')
@section('content')
    <div class="pagetitle">
        <h1>Pedidos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Pedidos</li>
                <li class="breadcrumb-item active">Lista</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body pt-3">
            <table id="sales-table" class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Monto</th>
                    <th scope="col"># Transacción</th>
                    <th scope="col">Tipo de pago</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal Sale Details --}}
    <div class="modal fade " id="modal-sale-details" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-3 px-4 py-2">
                <div class="modal-header">
                    <h5 class="modal-title ">Detalle de pedido</h5>
                    <button type="button" class="btn fw-bold" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body align-content-center">
                    <table id="sales-details-table" class="table table-striped table-bordered overflow-auto w-100">
                        <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <h6 style="text-align: right" id="total"></h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-submit rounded-3">Facturar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let table = $('#sales-table')
        table.DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
            destroy: true,
            responsive: true,
            serverSide: true,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                title: 'Pedidos',
                filename: 'Pedidos',
            }],
            ajax: '{{ route('sales.list') }}',
            columns: [
                {data: 'id'},
                {data: 'customer'},
                {data: 'amount'},
                {data: 'transaction_number'},
                {data: 'paid_type'},
                {data: 'status'},
                {data: 'date'},
                {
                    data: 'id',
                    render: function (id) {
                        return '<button onclick="showModalEdit('+id+')" type="button" class="btn  btn-sm btn-success" title="Track"><i class="fa-solid fa-truck-fast"></i></button> '+
                            '<button onclick="saleDetail('+ id +')" type="button" class="btn  btn-sm btn-outline-primary" title="Detalle pedido"><i class="fa-solid fa-eye"></i></button> '
                    }
                },
            ],
        });

        function saleDetail(id) {
            axios.get('{{ route('sale-details.index') }}?sale_id='+id)
                .then(function (response) {
                    let item = response.data.data
                    let total = 0
                    let tableDetails = $('#sales-details-table tbody')
                    tableDetails.empty()
                    $.each(item, function (key, value) {
                        tableDetails.append('<tr> '+
                            '<td>'+ value.product +'</td>'+
                            '<td>'+ value.amount +'</td>'+
                            '<td>'+ value.price +'</td>'+
                            '<td>'+ value.subtotal +'</td>'+
                        '</tr>')
                        total += value.subtotal
                    })
                    $('#total').html('Total: Q.'+total.toFixed(2))
                })
                .catch(function (error) {
                    showAlert('error', error.data.message)
                })
            let modal = new bootstrap.Modal(document.getElementById('modal-sale-details'), {
                keyboard: false
            })
            modal.show()
        }
    </script>
@endpush
