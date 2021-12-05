@extends('layouts.admin.base')

@section('container')
    <div class="bg-primary pt-10 pb-21"></div>
    <div class="container-fluid mt-n22 px-6">
        <!-- row  -->
        <div class="row mt-6">
            <div class="col-md-12 col-12">
                <!-- card  -->
                <div class="card">
                    <!-- card header  -->
                    <div class="card-header bg-white border-bottom-0 py-4">
                        <h4 class="mb-0">Utilisateurs</h4>
                    </div>
                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table text-nowrap mb-0">
                            <thead class="table-light">
                            <tr>
                                <th>Nom et Prénom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr data-user="{'email': '{{ $user->email }}', 'name': '{{ "$user->lastName $user->firstName" }}'}">
                                    <td class="align-middle">
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3 lh-1">
                                                <h5 class="fw-bold mb-1">
                                                    <a href="#" class="text-inherit">{{ "$user->lastName $user->firstName" }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $user->email }}</td>
                                    <td class="align-middle">
                                        <span class="badge bg-primary fs-5 shadow align-middle" style="top: 5px; right: 5px;">{{ $user->role->name }}</span>
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                            <span class="bi bi-trash-fill"></span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="delete-modal-label">Confirmation de suppression</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous supprimer l'utilisateur <strong class="text-primary" id="user-name">...</strong> ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('admin.users.destroy', ['user' => '#']) }}" method="POST" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-primary">Oui</button>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- card footer  -->
{{--                    <div class="card-footer bg-white text-center">--}}

{{--                    </div>--}}
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        document.querySelectorAll('button[data-bs-target="#delete-modal"]').forEach((button) => {
            button.addEventListener('click', (ev) => {
                const userData = JSON.parse(button.closest('tr').getAttribute('data-user').replace(/'/g, '"'));

                document.querySelector('div.modal strong#user-name').textContent = userData.email;

                const form = document.getElementById('delete-form');
                const action =  form.getAttribute('action').split('/');

                action.splice(action.length -1, 1, userData.email);

                form.setAttribute('action', action.join('/'));
            });
        });
    </script>
@endsection
