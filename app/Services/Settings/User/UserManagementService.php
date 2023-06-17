<?php

namespace App\Services\Settings\User;

use App\Models\User;

class UserManagementService
{
    public function getData($request)
    {
        $search = $request->search;
        $query = User::query();

        $query->when(request('search', false), function ($q) use ($search) {
            $q->where('name', 'like', '%' . $search . '%');
        });
        return $query->paginate(10);
    }
}
