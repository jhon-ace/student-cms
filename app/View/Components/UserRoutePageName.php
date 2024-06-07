<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class UserRoutePageName extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;

    public function __construct($routeName)
    {
        $this->setTitle($routeName);
    }

    protected function setTitle($routeName)
    {
        if (!Auth::check()) {
            $this->title = __('Student Classroom Management System');
            return;
        }

        $userType = Auth::user()->user_type;
        $titles = [
            'admin' => [
                'admin.dashboard' => __('Admin Dashboard'),
                'admin.program.index' => __('Manage Program'),
                'admin_profile.edit' => __('Admin Profile'),
                'program.create' => __('Add Program'),
                'program.edit' => __('Edit Program'),
            ],
            'instructor' => [
                'instructor.dashboard' => __('Instructor Dashboard'),
                'instructor_profile.edit' => __('Instructor Profile'),
                'settings' => __('Instructor Settings'),
            ],
            'student' => [
                'dashboard' => __('Student Dashboard'),
                'profile' => __('Student Profile'),
                'settings' => __('Student Settings'),
            ],
        ];

        $this->title = $titles[$userType][$routeName] ?? __('Student Classroom management System');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.user-route-page-name');
    }
}
