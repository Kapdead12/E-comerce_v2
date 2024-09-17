<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Mostrar la lista de roles
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    // Mostrar el formulario para crear un nuevo rol
    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    // Almacenar el nuevo rol en la base de datos
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required'
        ]);

        // Crear el rol
        $role = Role::create(['name' => $request->name]);

        // Asignar los permisos seleccionados al rol
        $role->givePermissionTo($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
    }

    // Mostrar el formulario para editar un rol
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('roles.edit', compact('role', 'permissions'));
    }

    // Actualizar el rol y sus permisos
    public function update(Request $request, Role $role)
    {
        // Validar la solicitud
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required'
        ]);

        // Actualizar el nombre del rol
        $role->update(['name' => $request->name]);

        // Sincronizar los permisos
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Rol actualizado exitosamente');
    }

    // Eliminar un rol
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado exitosamente');
    }
}

