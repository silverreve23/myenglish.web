<div class="col-md-3">
    <div class="card">
        <div class="card-header">
            Sidebar
        </div>
        <div class="card-body">
            <ul class="nav" role="tablist" style="flex-direction:column">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                        Dashboard
                    </a>
                </li>  
                <li role="presentation">
                    <a href="{{ url('/words') }}">
                        Words
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/repeats') }}">
                        Repeats
                    </a>
                </li>                
            </ul>
        </div>
    </div>
</div>
