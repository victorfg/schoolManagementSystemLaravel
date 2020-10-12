<div class="submenu-options">
    @can('canAccessToWeeks')
        <div class="item-option margin-right-15 cursor-pointer">
                <a href="{{route('calendar.index')}}">Semana</a>
        </div>
    @endcan
    @can('canAdminSubjects')
        <div class="item-option margin-right-15 cursor-pointer">
            <a href="{{route('subject.index')}}">Asignaturas</a>
        </div>
    @endcan
    @can('canAdminUsers')
        <div class="item-option margin-right-15 cursor-pointer">
            <a href="">Usuarios</a>
        </div>
    @endcan
    @can('canAdminEnrollments')
        <div class="item-option margin-right-15 cursor-pointer">
            <a href="{{route('enrollment.index')}}">Matrículas</a>
        </div>
    @endcan
    @can('canShowCourses')
        <div class="item-option margin-right-15 cursor-pointer">
            <a href="{{route('course.index')}}">Cursos</a>
        </div>
    @endcan
    </div>
