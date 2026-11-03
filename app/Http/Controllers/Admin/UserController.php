<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Listado de todos los usuarios (solo docente/admin).
     */
    public function index(): View
    {
        Gate::authorize('viewAny', User::class);

        $users = User::orderBy('name')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Detalle de un usuario concreto.
     */
    public function show(User $user): View
    {
        Gate::authorize('view', $user);

        return view('admin.users.show', compact('user'));
    }
}