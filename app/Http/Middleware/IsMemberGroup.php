<?php

namespace App\Http\Middleware;

use App\Models\Group;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsMemberGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::id();
        $groupId = $request->route()->parameter('group');
        $group = Group::find($groupId);
        if ($group && $group->users()->where('user_id', $user)->exists()) {
            return $next($request);
        }
        return redirect('/admin/dashboard')->with('error', 'Bạn không có quyền truy cập nhóm này.');
    }
}
