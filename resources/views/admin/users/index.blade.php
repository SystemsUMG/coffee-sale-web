@extends('app')
@section('content')
    <div class="pagetitle">
        <h1>Usuarios</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Usuarios</li>
                <li class="breadcrumb-item active">Lista</li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-body">
            <div style="display: flex; justify-content: right;" class="py-3">
                <button onclick="showCreate()" class="btn btn-primary rounded-3"><i class="fa-solid fa-plus"></i> Crear
                </button>
            </div>
            <table id="users-table" class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Número de Cuenta</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade " id="modal-create" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content rounded-3 px-4 py-2">
                <div class="modal-header">
                    <h5 class="modal-title ">Nuevo Registro</h5>
                    <button type="button" class="btn fw-bold" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body align-content-center">
                    <form class="row g-3 needs-validation" method="POST" action="{{ route('users.store') }}" novalidate enctype="multipart/form-data" id="form-create">
                        @csrf
                        @include('admin.users.form')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel rounded-3" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-submit rounded-3" form="form-create">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    <div class="modal fade" id="modal-edit" tabindex="-1">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content rounded-3 px-4 py-2">
                <div class="modal-header">
                    <h5 class="modal-title ">Editar Registro</h5>
                    <button type="button" class="btn fw-bold" data-bs-dismiss="modal" aria-label="Close">x</button>
                </div>
                <div class="modal-body align-content-center">
                    <form class="row g-3 needs-validation" method="POST" novalidate id="form-edit">
                        @method('PUT')
                        @csrf
                        @include('admin.users.form')
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel rounded-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-submit rounded-4" form="form-edit">Guardar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        let table = $('#users-table')
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
                title: 'Usuarios',
                filename: 'Usuarios',
            }],
            ajax: '{{ route('users.list') }}',
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'description'},
                {data: 'stock'},
                {data: 'price'},
                {data: 'weight'},
                {
                    data: 'active',
                    render: function (active) {
                        return active === 1 ? '<span class="badge rounded-pill bg-success">Activo</span>' :
                            '<span class="badge rounded-pill bg-danger">Inactivo</span>'
                    }
                },
                {
                    data: 'id',
                    render: function (id) {
                        let route = 'admin/users'
                        let dataDestroy = [id, "'"+ route +"'"]
                        return '<button onclick="showModalEdit('+id+')" type="button" class="btn  btn-sm btn-warning" title="Editar"><i class="fa-sharp fa-solid fa-pen-to-square"></i></button> '+
                            '<button onclick="destroy('+ dataDestroy +')" type="button" class="btn  btn-sm btn-primary" title="Ver fotos"><i class="fa-solid fa-eye"></i></button> '+
                            '<button onclick="destroy('+ dataDestroy +')" type="button" class="btn  btn-sm btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button> '
                    }
                },
            ],
        });

        function showModalEdit(id) {
            axios.get('/admin/users/' + id)
                .then(function (response) {
                    let product = response.data
                    document.getElementById('form-edit').querySelector('#name').value = product.name;
                    document.getElementById('form-edit').querySelector('#description').value = product.description;
                    document.getElementById('form-edit').querySelector('#price').value = product.price;
                    document.getElementById('form-edit').querySelector('#stock').value = product.stock;
                    document.getElementById('form-edit').querySelector('#weight').value = product.weight;
                    document.getElementById('form-edit').querySelector('#active').value = product.active;
                    document.getElementById('form-edit').setAttribute('action', '/admin/products/' + id)
                })
                .catch(function (error) {
                    showAlert('error', error.data.message)
                })
            let modal = new bootstrap.Modal(document.getElementById('modal-edit'), {
                keyboard: false
            })
            modal.show()
        }

        function showCreate() {
            let modal = new bootstrap.Modal(document.getElementById('modal-create'), {
                keyboard: false
            })
            modal.show()
        }

    </script>
@endpush
