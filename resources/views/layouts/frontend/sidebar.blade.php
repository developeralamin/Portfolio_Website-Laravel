<aside class="left-sidebar">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                   <li class="nav-devider mt-0" style="margin-bottom: 5px"></li>
                    <li> 
                     <a href={{ route('admin.dashboard') }} ><span> <i class="fas fa-home"></i> </span><span class="hide-menu">Home</span></a>
                   </li>

                     {{-- <li> 
                        <a href="#" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Visitor</span></a>
                    </li> --}}
                    
                     <li> 
                        <a href="{{ route('benner.index') }}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Bennar</span></a>
                    </li>

                    <li class="{{ Request::is('admin/service*') ? 'active':'' }}"> 
                        <a href="{{  route('service.index') }}" ><span> <i class="fas fa-globe"></i> </span><span class="hide-menu">Services</span></a>
                    </li>

                    <li> 
                        <a href="{{ route('courses.index') }}" ><span> <i class="fas fa-users"></i> </span><span class="hide-menu">Courses</span></a>
                    </li>

                     <li> 
                        <a href="{{ route('project.index') }}" ><span> <i class="fas fa-code"></i> </span><span class="hide-menu">Project</span></a>
                    </li>

                    <li> 
                        <a href="{{ route('contact.index') }}" ><span> <i class="fas fa-envelope"></i> </span><span class="hide-menu">Contact</span></a>
                    </li>

                    <li> 
                        <a href="{{ route('review.index') }}" ><span> <i class="fas fa-comments"></i> </span><span class="hide-menu">Review</span></a>
                    </li>

					</ul>
                </nav>
            </div>
</aside>
