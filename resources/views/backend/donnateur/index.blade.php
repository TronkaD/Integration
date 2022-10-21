@extends('backend.app')
@section('content')
    @include('backend.partials.slidebar')
    @include('backend.partials.navbar')
    <style>
        table.dataTable.no-footer {
            border-bottom: 0px solid rgba(0, 0, 0, 0.1);
        }
    </style>
    <div class="bg-gray-200 text-sm">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 py-3">
                    <li class="breadcrumb-item"><a class="fw-light" href="{{route('dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active fw-light" aria-current="page">Donnateurs</li>
                </ol>
            </nav>
        </div>
    </div>

    <header class="py-4">
        <div class="row">
            <div class="col-sm-6 text-sm-start">
                <div class="container-fluid">
                    <h1 class="h3 fw-normal mb-0">Donnateurs</h1>
                </div>
            </div>
            <div class="col-sm-6 text-sm-end">
                <div class="container-fluid">
                    <a href="{{route('ajout_donnateur')}}" class="btn btn-secondary">Ajouter un donnateur</a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header border-bottom">
                    <h4>Liste des donnateurs</h4>
                </div>
                <div class="table-responsive">
                    <table class="table text-sm mb-0" id="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Status</th>
                            <th>Modifier</th>
                            <th>Supprimier</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($donnateurs as $key=>$donnateur)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$donnateur->nom}}</td>
                                    <td>{{$donnateur->prenom}}</td>
                                    <td>{{$donnateur->email}}</td>
                                    <td>{{$donnateur->tel}}</td>
                                    <td>{{$donnateur->status}}</td>
                                    <td><a href="{{route('update_donnateur', ['donnateur'=>$donnateur])}}" title="Modifier"><i class="fa fa-edit text-success"></i></a></td>
                                    <td><a href="#" title="Supprimer" id="btn_delete_{{$donnateur->id}}"><i class="fa fa-trash text-danger"></i></a></td>
                                    <script src="{{asset('backend/vendor/jquerycomfirm/jquery-confirm.min.js')}}"></script>
                                    <script>
                                        $('#btn_delete_{{$donnateur->id}}').click(function (e){
                                            e.preventDefault();
                                            $.confirm({
                                                title: 'Confirmer?',
                                                type:'green',
                                                content: 'Voulez-vous supprimer ce élément?',
                                                buttons: {
                                                    oui: function () {
                                                        btnClass:'btn-green'
                                                        $.ajaxSetup({
                                                            headers: {
                                                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                            }
                                                        });
                                                        $.ajax({
                                                            url: "/dashboard/donnateurs/delete/{{$donnateur->id}}",
                                                            type: "DELETE",
                                                            processData: false,
                                                            data:{
                                                                "id": {{$donnateur->id}},
                                                                "_token": "{{ csrf_token() }}",
                                                            },
                                                            success: function (data) {
                                                                console.log(data);
                                                                if(data.Statuts === 200){
                                                                    document.location.reload();
                                                                }else{
                                                                    alert("Something went wrong");
                                                                }

                                                            },
                                                            error: function (data) {
                                                                console.log(data);
                                                                alert("Something went wrong");
                                                            }
                                                        });
                                                    },
                                                    annuler: function () {
                                                    // $.alert('Canceled!');
                                                    },
                                                    
                                                }
                                            });
                                        });
                                    </script>
                                </tr>
                            @empty
                                <tr><span class="alert alert-info w-100 text-center">Aucun élément disponible</span></tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('backend/vendor/datatables/datatables.min.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('#table').DataTable({
                "language": {
                    url:"{{asset('backend/vendor/datatables/')}}/french.json"
                }
            });
        } );
    </script>
@endsection

