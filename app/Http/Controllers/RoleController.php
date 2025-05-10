<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // 2.1.1.1.5.1 Get Roles
    public function index()
    {
        return response()->json(Role::all());
    }

    // 2.1.1.1.5.2 Add Role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->name]);

        return response()->json(['message' => 'Role created successfully', 'role' => $role]);
    }

    // 2.1.1.1.5.3 Edit Role
    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|unique:roles,name,' . $id,
        ]);

        $role->update(['name' => $request->name]);

        return response()->json(['message' => 'Role updated successfully', 'role' => $role]);
    }

    // 2.1.1.1.5.4 Delete Role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['message' => 'Role deleted successfully']);
    }
}
