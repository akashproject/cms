<!-- Main Sidebar Container -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->

        <!-- ============================================================== -->

        <aside class="left-sidebar" data-sidebarbg="skin5">

            <!-- Sidebar scroll-->

            <div class="scroll-sidebar">

                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">

                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/') }}" target="_blank" aria-expanded="false"><i class="mdi mdi-web"></i><span class="hide-menu">Visit Site</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('/administrator') }}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                        @if($user->is_admin != null)

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span class="hide-menu">Users </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{ url('users') }}" class="sidebar-link"><i class="mdi mdi-emoticon"></i><span class="hide-menu"> All Users </span></a></li>
                                </ul>
                            </li> 

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple-variant"></i><span class="hide-menu">Pages </span></a>

                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item"><a href="{{ url('administrator/pages') }}" class="sidebar-link"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> All Pages </span></a></li>

                                    <li class="sidebar-item"><a href="{{ url('administrator/add-page') }}" class="sidebar-link"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> Add Page </span></a></li>

                                </ul>

                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-book-multiple-variant"></i><span class="hide-menu">Ad Pages </span></a>

                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item"><a href="{{ url('administrator/ad-pages') }}" class="sidebar-link"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> All Ad Pages </span></a></li>

                                    <li class="sidebar-item"><a href="{{ url('administrator/add-ad-page') }}" class="sidebar-link"><i class="mdi mdi-border-inside"></i><span class="hide-menu"> Add Ad Page </span></a></li>

                                </ul>

                            </li>

                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ url('administrator/media') }}" aria-expanded="false"><i class="mdi mdi-folder-multiple-image"></i><span class="hide-menu">Media Library</span></a></li>

                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Blogs </span></a>

                                <ul aria-expanded="false" class="collapse  first-level">

                                    <li class="sidebar-item"><a href="{{ url('administrator/blogs') }}" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> All Blogs </span></a></li>
                                    <li class="sidebar-item"><a href="{{ url('administrator/add-blog') }}" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> Add Blog </span></a></li>
                                    <li class="sidebar-item"><a href="{{ url('administrator/categories') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu"> Categories </span></a></li>
                                    <li class="sidebar-item"><a href="{{ url('administrator/authors') }}" class="sidebar-link"><i class="mdi mdi-account"></i><span class="hide-menu"> Authors </span></a></li>
                                  
                                </ul>

                            </li>



                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ url('administrator/tags') }}" aria-expanded="false"><i class="mdi mdi-tag"></i><span class="hide-menu">Tags</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ url('administrator/reviews') }}" aria-expanded="false"><i class="mdi mdi-star"></i><span class="hide-menu">Reviews</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="{{ url('administrator/contacts') }}" aria-expanded="false"><i class="mdi mdi-email"></i><span class="hide-menu">Contacts</span></a></li>
                            
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-file-document-box"></i><span class="hide-menu">Settings </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{ url('administrator/settings') }}" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> Settings </span></a></li>
                                    <li class="sidebar-item"><a href="{{ url('administrator/general-settings') }}" class="sidebar-link"><i class="mdi mdi-file-document-box"></i><span class="hide-menu"> General Settings </span></a></li>
                                </ul>
                            </li>
                           
                        @endif
                        
                    </ul>
                </nav>

                <!-- End Sidebar navigation -->

            </div>

            <!-- End Sidebar scroll-->

        </aside>

        <!-- ============================================================== -->

        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

