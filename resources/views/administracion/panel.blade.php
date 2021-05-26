<x-menu-grupos>
    <x-slot name="slot">
        <h1 style="margin-left: 35px;">Administración</h1>
        <div class="row m-4">
            <a href="{{route('roles.index')}}" class="btn btn-outline-danger">Roles</a>
        </div>
        <div class="row align-items-start">
            {{-- <div class="card mt-2 ml-5 mr-2 w-20 text-danger">
                <div class="card-body">
                    <h5 class="card-title">Profesores<span class="material-icons align-middle"
                            style="font-size: 40px;">school</span></h5>
                </div>
            </div>
            <div class="card mt-2 ml-4 mr-2 w-20 text-danger">
                <div class="card-body">
                    <h5 class="card-title">Coordinadores<span class="material-icons align-middle"
                        style="font-size: 40px;">supervisor_account</span></h5>
                </div>
            </div>
            
            <div class="card mt-2 ml-4 mr-2 w-20 text-danger">
                <div class="card-body">
                    <h5 class="card-title">Administradores<span class="material-icons align-middle"
                            style="font-size: 40px;">admin_panel_settings</span></h5>
                </div>
            </div>
            <div class="card mt-2 ml-4 mr-2 w-20 text-danger">
                <div class="card-body">
                    <h5 class="card-title">Incidencias<span class="material-icons align-middle"
                            style="font-size: 40px;">report_problem</span></h5>
                </div>
            </div> --}}
			
            <div class="card mt-2 ml-4 mr-2 w-20 text-danger" style="width: 100%;">
				<div class="card-body" style="width: 96%">
					 <h5 class="card-title">Calendario<span class="material-icons align-middle"
                            style="font-size: 40px;">calendar_today</span></h5>
                            <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Europe%2FMadrid&amp;src=bm9yZXBseWdlbW1hYWxtZXJpYUBnbWFpbC5jb20&amp;src=ZXMuc3BhaW4jaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&amp;color=%23039BE5&amp;color=%230B8043&amp;showTitle=0" style="border-width:0" width="100%" height="800px"  frameborder="0" scrolling="no">
                            </iframe>
				</div>
            </div>


        </div>
    </x-slot>
</x-menu-grupos>
