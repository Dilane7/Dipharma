<x-layaout>
    <div class="container">
        <h3 class="mb-4" style="color:#176abc">Gestion des Utilisateurs</h3>

        @if (session('success'))
            <div class="alert alert-success mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive p-3 shadow-sm rounded bg-white mb-4">
            <div class="d-flex justify-content-between align-items-center p-3">
                <h5 style="color: #176abc">Liste des utilisateurs</h5>
                <form action="{{ route('users.index') }}" method="GET" class="d-flex">
                    <input type="text" class="form-control mr-3 w-50" placeholder="Rechercher par nom..." name="search" value="{{ request('search') }}">
                    <button class="btn btn-outline-success" type="submit">Rechercher</button>
                </form>
            </div>
            <table class="table table-striped text-dark">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Rôles</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->telephone ?? '-' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @forelse ($user->roles as $role)
                                    <span class="badge text-white " style="background-color:#176abc">{{ $role->name }}</span>
                                @empty
                                    <span class="badge bg-light text-muted">Aucun rôle</span>
                                @endforelse
                            </td>
                            <td class="text-end">
                                <a href="{{ route('users.show', $user) }}" class="btn btn-sm text-info"><i class='fas fa-eye' style='font-size:17px'></i></a>
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm "><i class='fas fa-pencil-alt' style='font-size:18px;color:orange'></i></a>
                                @if ($user->id !== auth()->id())
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm " onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')"><i class='fas fa-trash-alt' style='font-size:17px;color:red'></i></button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Aucun utilisateur trouvé.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
           
        </div>
        {{ $users->links() }}
    </div>
</x-layaout>